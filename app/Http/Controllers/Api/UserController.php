<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Silber\Bouncer\Database\Role;
use JWTAuth;
use App\Images;
use App\commonfunction;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Api\BaseController;
use DB; 
use Carbon\Carbon; 
use Mail; 
use Illuminate\Support\Str;

class UserController extends BaseController
{
    public function authenticate(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            $this->status = false;
            $this->data = $validator->errors();
            $this->message ='Error validation';
            return $this->sendResult();
        }
		$user = User::where('email',$request->email)->first();
        if(!$user){
            $this->message ="Please register your account";
            $this->status = false;
            return $this->sendResult();
        }
        $credentials = $request->only('email', 'password');

        try {
            $registereduser = User::where('email', $request->get('email'))->first();
            if (!$registereduser) {
                return response()->json(['code' => '102', 'error' => 'Please register your account', 'status' => false]);
            }

            if (!$token = JWTAuth::attempt($credentials)) {
				$this->status = false;
				$this->message ='Inavalid Credentials';
				$this->errors = 'Unauthorised';
				return $this->sendResult();
                //return response()->json(['code' => '102', 'error' => 'Inavalid Credentials', 'status' => false]);
            }
            if($registereduser && isset($request->device_token)){
                $update_token= User::where('id', $registereduser->id)
                ->update(['device_token' => $request->device_token]);
            }
        } catch (JWTException $e) {
            return response()->json(['code' => '102', 'error' => 'could_not_create_token', 'status' => false]);
        }
        $user = JWTAuth::user();
        $user_id = $user->id;
        User::where('id', $user_id)
            ->update(['login_by' => 'email']);
        return response()->json(['code' => '101', 'token' => $token, 'user' => $user, 'status' => true]);
    }
	
	
	public function forgetPassword(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|exists:users',
		]);
		if($validator->fails()){
			$this->status = false;
			$this->data = $validator->errors();
			$this->message ='Error validation';
			return $this->sendResult();
		}
		$token = Str::random(64);
		  DB::table('password_resets')->insert([
			  'email' => $request->email, 
			  'token' => $token, 
			  'created_at' => Carbon::now()
			]);
		Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
			  $message->to($request->email);
			  $message->subject('Reset Password');
		  });
		return response()->json(['code' => '101', 'message'=>'We have e-mailed your password reset link!', 'status' => true]);
    }
	
	
	
	
	
	

    public function register(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
			'name' => 'required',
			'role'=> 'required',
        ]);
        if($validator->fails()){
            $this->status = false;
            $this->data = $validator->errors();
            $this->message ='Error validation';
            return $this->sendResult();
        }
		
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => $request->get('email') != "" ? 'string|email|max:255|unique:users' : '',
            'phone' => $request->get('phone') != "" ? 'unique:users' : '',
            // 'password' =>  $request->get('email')!="" ? 'required|string|min:6':''
        ]);

        if ($validator->fails()) {
            $error = $this->validationErrorsToString($validator->errors());
            return response()->json(['code' => '102', 'error' => $error, 'status' => false]);
        }
        $slug=commonfunction::createSlug($request->get('name'),0,'user');
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email') == "" ? NULL : $request->get('email'),
			'role' => $request->get('role') == "" ? NULL : $request->get('role'),
            'password' => $request->get('password') == "" ? NULL : Hash::make($request->get('password')),
            'phone' => $request->get('phone') == "" ? NULL : $request->get('phone'),
            'slug' => $slug
        ]);
        $role=$request->get('role');
        if($role){
            $user->assign($role);
        }else{
            $user->assign('user');
        }
        $user->role=$user->getRoles();
        $token = JWTAuth::fromUser($user);

        return response()->json(['code' => '101', 'token' => $token, 'user' => $user, 'status' => true]);
    }
	
	

    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
				$this->status = false;
				$this->message ='User not found';
				$this->errors ='user_not_found';
				$this->errorCode =103;
				return $this->sendResult();
                //return response()->json(['code' => '103', 'error' => 'user_not_found', 'status' => false]);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
			$this->status = false;
			$this->message =$e->getStatusCode();
			$this->errors ='token_expired';
			$this->errorCode =103;
			return $this->sendResult();
            //return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
			$this->status = false;
			$this->message =$e->getStatusCode();
			$this->errors ='token_invalid';
			$this->errorCode =103;
			return $this->sendResult();
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
		$this->status = true;
		$this->message ='User  found';
		$this->errorCode =200;
		$this->data = $user;
		return $this->sendResult();
        //return response()->json(compact('user'));
    }
    public function phonelogin(Request $request)
    {
        if ($request->input('phone') != "") {
            $user_name = $request->input('name');
            $user = User::where('phone', $request->input('phone'))->first();
            if ($user) {
                $user_id = $user->id;
                User::where('id', $user_id)
                    ->update(['login_by' => 'phone']);
                $user = User::where('phone', $request->input('phone'))->first();
                if(isset($request->device_token)){
                    $update_token= User::where('id', $user_id)
                    ->update(['device_token' => $request->device_token]);
                }
                $error = array(
                    'code'        => '101',
                    'token'   => JWTAuth::fromUser($user),
                    'user' => $user,
                    'status' => true
                );
            } else {
                $error = array(
                    'code'        => '102',
                    'code_text'   => 'Phone number not exist',
                    'status' => false
                );
            }
        } else {
            $error = array(
                'code'        => '102',
                'code_text'   => 'Please enter phone number',
                'status' => false
            );
        }

        return response()->json($error);
    }
    public function sociallogin(Request $request)
    {
        try {
         //   if ($request->email) {
                $login_by = $request->loginby;
                switch ($login_by) {
                    case 'facebook':
                        $userfacebookid = User::where('facebookid', $request->facebookid)->first();
                        $user = User::firstOrNew(array('email' => $request->email));
                        if ($userfacebookid == null) {
                            $user->name = $request->name;
                            $user->image = $request->image;
                        }
                        $user->facebookid = $request->facebookid;
                        break;
                    case 'google':
                        $usergoogleid = User::where('provider_id', $request->googleid)->first();
                        $user = User::firstOrNew(array('email' => $request->email));
                        // if ($usergoogleid == null) {
                        //     $user->name = $request->name;
                        //     $user->avatar = $request->avatar;
                        //     }
                        $user->name = $request->name;
                        $user->avatar = $request->avatar;
                        $user->provider_name = $login_by;
                        $user->provider_id = $request->googleid;
                        $user->login_by = $login_by;
                        if(isset($request->device_token)){
                        $user->device_token=$request->device_token;
                        }
                        break;
                    case 'apple':
                        // $usergoogleid = User::where('provider_id', $request->appleid)->first();
                        $user = User::firstOrNew(array('provider_id' => $request->appleid));
                        if(isset($request->name)){
                        $user->name = $request->name == '' ? NULL : $request->name;
                        }
                        if(isset($request->avatar)){
                        $user->avatar = $request->avatar == '' ? NULL : $request->avatar;
                        }
                        $user->provider_name = $login_by;
                        if(isset($request->email)){
                            $user->email = $request->email == '' ? NULL : $request->email;
                        }                        
                        $user->login_by = $login_by;
                        if(isset($request->device_token)){
                            $user->device_token=$request->device_token;
                            }
                        break;
                }
                if(isset($user->name)){
                    $user->slug=commonfunction::createSlug($user->name,0,'user');;
                }
                $user->save();
                $user_id = $user->id;
                $Usertoken = JWTAuth::fromUser($user);
                return response()->json(['code' => '101', 'token' => $Usertoken, 'user' => $user, 'status' => true]);
         //   }
        } catch (Exception $e) {
            return response()->json(['code' => '102', 'status' => false]);
        }
    }
    public function validationErrorsToString($errArray)
    {
        $valArr = array();
        foreach ($errArray->toArray() as $key => $value) {
            $errStr = $value[0];
            array_push($valArr, $errStr);
        }
        if (!empty($valArr)) {
            $errStrFinal = implode(',', $valArr);
        }
        return $errStrFinal;
    }

    public function change_password(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
			'confirm_password' => 'required|same:new_password'
        ]);
        if($validator->fails()){
            $this->status = false;
            $this->data = $validator->errors();
            $this->message ='Error validation';
			$this->errorCode =103;
            return $this->sendResult();
        }
		
        $input = $request->all();

        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['code' => '103', 'error' => 'user_not_found', 'status' => false]);
        }
        $user = JWTAuth::user();
        $userid = $user->id;
        $rules = array(
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
			$arr = array("status" => false, "code" => "102", "message" => $this->validationErrorsToString($validator->errors()));
        } else {
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    $arr = array("status" => false, "code" => "102", "message" => "Check your old password.", "data" => array());
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    $arr = array("status" => false, "code" => "102", "message" => "Please enter a password which is not similar then current password.", "data" => array());
                } else {
                    User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => true, "code" => "101", "message" => "Password updated successfully.");
                }
            } catch (Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => false, "code" => "102", "message" => $msg);
            }
        }
        return response()->json($arr);
    }


    public function edituser(Request $request)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['code' => '103', 'error' => 'user_not_found', 'status' => false]);
            }
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => $request->get('email') != $user->email ? 'string|email|max:255|unique:users' : '',
                'phone' => $request->get('phone') != $user->phone ? 'unique:users' : '',
                // 'password' =>  $request->get('email')!="" ? 'required|string|min:6':''
            ]);


            if ($validator->fails()) {
                $error = $this->validationErrorsToString($validator->errors());
                return response()->json(['code' => '102', 'error' => $error, 'status' => false]);
            }
            $user_id = $user->id;
            $data = $request->all();
            if (!$request->get('email')) {
                $data['email'] = $user->email;
            }
            if (!$request->get('phone')) {
                $data['phone'] = $user->phone;
            }
            User::where('id', $user_id)->update(['name' => $data['name'], 'phone' => $data['phone'] == '' ? NULL : $data['phone'], 'email' => $data['email'] == '' ? NULL : $data['email']]);
            $userdata = User::where('id', $user_id)->first();
            $token = JWTAuth::fromUser($userdata);
            return response()->json(['code' => '101', 'status' => true, 'user' => $userdata, 'token' => $token]);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['success' => false, 'error' => 'Token is Invalid', 'code' => '102']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['success' => false, 'error' => 'Token is Expired', 'code' => '102']);
            } else {
                return response()->json(['success' => false, 'code' => '102', 'error' => $e]);
            }
        }
    }

    public function changeavtar(Request $request)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['code' => '103', 'error' => 'user_not_found', 'status' => false]);
            }
            $data = $request->all();
            //get the base-64 from data
            $url = false;
            $token = "";
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $path = public_path() . '/uploads/image/user' . $user->id . '/';
                $file->move($path, $filename);
                $url = url('/uploads/image/user' . $user->id . '/' . $filename);
                User::where('id', $user->id)->update(['avatar'=>$url]);
                $userdata = User::where('id', $user->id)->first();
                $token = JWTAuth::fromUser($userdata);
            }

            return response()->json(['code' => '101', 'url' => $url, 'token' => $token, 'status' => true]);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['success' => false, 'error' => 'Token is Invalid', 'code' => '102']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['success' => false, 'error' => 'Token is Expired', 'code' => '102']);
            } else {
                return response()->json(['success' => false, 'code' => '102', 'error'=>$e]);
            }
        }
    }



    public function change_avtar(Request $request)
    {
        try {
            $data = $request->all();
            //get the base-64 from data
            $url = false;
            $token = "";
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $path = public_path() . '/uploads/image/user' . $data['user_id'] . '/';
                $file->move($path, $filename);
                $url = url('/uploads/image/user' . $data['user_id'] . '/' . $filename);
                User::where('id', $data['user_id'])->update(['avatar'=>$url]);
                $userdata = User::where('id', $data['user_id'])->first();
                $token = JWTAuth::fromUser($userdata);
            }

            return response()->json(['code' => '101', 'url' => $url, 'token' => $token, 'status' => true]);
        } catch (Exception $e) {           
                return response()->json(['success' => false, 'code' => '102', 'error'=>$e]);        
        }
    }
    public function update_devicetoken(Request $request){
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['code' => '103', 'error' => 'user_not_found', 'status' => false]);
            }
            $update_token= User::where('id', $user->id)
            ->update(['device_token' => $request->device_token]);
            return response()->json(['code' => '101', 'status' => true]);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['success' => false, 'error' => 'Token is Invalid', 'code' => '102']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['success' => false, 'error' => 'Token is Expired', 'code' => '102']);
            } else {
                return response()->json(['success' => false, 'code' => '102', 'error'=>$e]);
            }
        }
    }

    public function add_contactus(Request $request)    
    {         
          
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required'            
        ]);

        if ($validator->fails()) {
            $error = $this->validationErrorsToString($validator->errors());
            return response()->json(['code' => '102', 'error' => $error, 'status' => false]);
        }       
        
        $user = [
            'name' => $request->name == "" ? NULL : $request->name,                                   
            'phone' => $request->phone == "" ? NULL : $request->phone,
            'email' => $request->email == "" ? NULL : $request->email,
            'message' => $request->message == "" ? NULL : $request->message            
        ];       

        $query_insert = DB::table('contacts')->insert($user);
        
        if($query_insert){
            return response()->json(['code' => '101',  'user' => $user, 'status' => true]);
        }else{
            return response()->json(['code' => '102',  'error' => 'Something went wrong', 'status' => false]);
        }                

        
    }
    public function image_uploadss(Request $request)    
    {   
        /*$this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);*/  
        $property_id = '841'; 
        $propertyimage = $request->file('image');
            if($request->hasFile('image')){
                $filename =  rand().'_'.$propertyimage->getClientOriginalName();
                $path = public_path() . '/uploads/image/';
                $propertyimage->move($path, $filename);
                $url = url('/uploads/image/' . $filename);        
                $imagesdata = [
                    'property_id' => $property_id == "" ? NULL : $property_id,                                   
                    'url' => $url == "" ? NULL : $url,
                    'name' => $filename == "" ? NULL : $filename,
                    'featured' => '0', 
                    'created_at' => date("Y-m-d H:i:s", strtotime('now')),
                    'updated_at' => date("Y-m-d H:i:s", strtotime('now'))           
                ];                
                $imageinsert = DB::table('images')->insert($imagesdata);                
                if($imageinsert){
                    return response()->json(['code' => '101',  'images' => $imagesdata, 'status' => true]);
                }else{
                    return response()->json(['code' => '102',  'error' => 'Image not upload', 'status' => false]);
                }       
            
        } else{
            return response()->json(['code' => '102',  'error' => 'Something went wrong', 'status' => false]);
        } 

              
    } 

    public function image_upload(Request $request)
    {
        if(!$request->hasFile('image')) {            
            return response()->json(['code' => '404','images' => 'Please Upload Image','status' => false] );
        }
     
        $allowedfileExtension=['pdf','jpg','png','jpeg'];
        $files = $request->file('image'); 
        $errors = [];
        $property_id = '841';
        foreach ($files as $file) {    
            //$extension = $file->getClientOriginalExtension();     
            //$check = in_array($extension,$allowedfileExtension);
            $newurlimages=array(); 
            $newimagesname=array();    
            //if($check) {                
                foreach($request->image as $propertyimage) {
                    $filename =  rand().'_'.$propertyimage->getClientOriginalName();
                    $path = public_path() . '/uploads/image/';
                    $propertyimage->move($path, $filename);
                    $url = url('/uploads/image/' . $filename); 
                    $newurlimages[] = url('/uploads/image/' . $filename);
                    $newimagesname[] = $filename; 
                    $imagesdata = [
                        'property_id' => $property_id == "" ? NULL : $property_id,                                   
                        'url' => $url == "" ? NULL : $url,
                        'name' => $filename == "" ? NULL : $filename,
                        'featured' => '0', 
                        'created_at' => date("Y-m-d H:i:s", strtotime('now')),
                        'updated_at' => date("Y-m-d H:i:s", strtotime('now'))           
                    ];                
                    $imageinsert = DB::table('images')->insert($imagesdata);   
                                   
                }
            //} else {
                //return response()->json(['code' => '102',  'images' => 'invalid_file_format', 'status' => false]);         
            //}
            return response()->json(['code' => '101',  'images' => 'file_uploaded', 'imageurl'=> $newurlimages, 'image'=> $newimagesname, 'path' => $path, 'status' => true]);    
        }
    }   

    public function forgetPasswords(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',            
        ]);
        if($validator->fails()){
            $this->status = false;
            $this->data = $validator->errors();
            $this->message ='Error validation';
            return $this->sendResult();
        }        
        try {
            $registereduser = User::where('email', $request->get('email'))->first();
            if (!$registereduser) {
                return response()->json(['code' => '102', 'error' => 'Please register your account', 'status' => false]);
            }else{
                $token = Str::random(64);
                DB::table('password_resets')->insert([
                  'email' => $request->email, 
                  'token' => $token, 
                  'created_at' => Carbon::now()
                ]);
                Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                  $message->to($request->email);
                  $message->subject('Reset Password');
                });
                return response()->json(['code' => '101', 'message'=>'We have e-mailed your password reset link!', 'status' => true]);                
            }            
            exit();
            
            
        } catch (JWTException $e) {
            return response()->json(['code' => '102', 'error' => 'something went wrong', 'status' => false]);
            exit();
        }        
        
    }

    public function deleteUser($id = NULL){
        if($id==NULL){
            return response()->json(['code' => '102', 'error' => 'id missing in parameter', 'status' => false ]);
        }
        $userdata = User::where('id', $id)->first();  
        if ($userdata === null) {
            return response()->json(['code' => '102', 'error' => 'user does not exist in our records', 'status' => false]);
            exit();
        }   
        if($userdata && $userdata->delete()){
            return response()->json(['code' => '101', 'error' => 'user has been deleted', 'status' => true]);
            exit();
        }else{
            return response()->json(['code' => '102', 'error' => 'user has not deleted', 'status' => false]);
            exit();
        }
    }
}

