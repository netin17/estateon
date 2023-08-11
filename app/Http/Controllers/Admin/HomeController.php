<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Property;
use App\Leads;
use App\PropertyVisitor;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user']=User::count();
        $data['rent']=Property::where('type', 'rent')->count();
        $data['sale']=Property::where('type', 'sale')->count();
        return view('home', compact('data'));
    }

    public function logout(Request $request) {
        //print 'aa'; die;
        Auth::guard('web')->logout();
        return redirect('/admin');
      }

      public function leads(Request $request){
        if (!Gate::allows('property_manage') && !Gate::allows('users_manage')) {
            return abort(401);
        }
        $data=[];
        $data['leads']=Leads::with(['property', 'user'])->orderBy('id','DESC')->paginate(10);
        // echo "<pre>"; print_r($data['leads']->toArray());
        // exit;
        return view('admin.home.leads', compact('data'));
      }

      public function visitors(Request $request){
        if (!Gate::allows('property_manage') && !Gate::allows('users_manage')) {
            return abort(401);
        }
        $data=[];
        $data['visitors']=PropertyVisitor::with(['property', 'user'])->orderBy('id','DESC')->paginate(10);
        //  echo "<pre>"; print_r($data['visitors']->toArray());
        // exit;
        return view('admin.home.visitors', compact('data'));
      }
}
