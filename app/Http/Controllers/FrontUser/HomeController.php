<?php

namespace App\Http\Controllers\FrontUser;

use App\Property;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
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

}
