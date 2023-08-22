<?php

namespace App\Http\Controllers\FrontUser;

use App\Property;
use App\Contacts;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Exception;
use App\Traits\CommonTrait;
class HomeController extends Controller
{
    use CommonTrait;
    protected $redirectTo = '/frontuser/change_password';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentuserid = Auth::guard('frontuser')->user()->id;
        $data = [];
        $data['sales_count'] = Property::where('created_by',$currentuserid)->where('type','sale')->count();
        $data['rent_count'] = Property::where('created_by',$currentuserid)->where('type','rent')->count();
        return view('userdashboard.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showChangePasswordForm()
    {
       
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user']=$this->getUserDetailsById($userId);
            $data['p_count']=$this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            //$data['property_type'] = PropertyType::get();
            
    
            // return view('userdashboard.property.create', compact('data'));
            return view('dashboard.profile', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
        // return view('frontuser.change_password', compact('user'));
       
    }

    /**
     * Change password.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        $user = Auth::getUser();
        $this->validator($request->all())->validate();
        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->password = $request->get('new_password');
            $user->save();
            return redirect($this->redirectTo)->with('message', 'Password changed successfully!');
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
    }

    public function addContact(Request $request){
      
        if (Auth::check()) {
            $validated = $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'], // Allow only letters and spaces
                'email' => 'required|email',
                'phone' => ['required', 'regex:/^[6789]\d{9}$/'],
                'state_id' => 'required',
                'message_type' =>'required'
            ],[
                'name.required' => 'The name field is required.',
                'name.regex' => 'The name field should only contain letters and spaces.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'phone.required' => 'The phone number field is required.',
                'phone.regex' => 'Please enter a valid Indian phone number.',
                'state_id.required' => 'The state field is required.',
                'message_type.required' => 'The Topic field is required.',
            ]);
            $userId = Auth::user()->id;
            $data = $request->all();
            $contacts=Contacts::create([
                "name"=> $data['name'],
                "email" => $data['email'],
                "phone" => $data['phone'],
                "message_type" => $data['message_type'],
                "state_id" => $data['state_id'],
                "message" => $data['message'],
                "property_id" =>isset($data['property_id']) ? $data['property_id']: null,
                "user_id" =>$userId
            ]);
            return redirect()->back()->with('message', 'Thank you, We will contact you soon');
            } else {
                return redirect()->route('frontuser.property.index');
            }
        
    }

    

}
