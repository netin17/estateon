<?php

namespace App\Http\Controllers\FrontUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PlanTypes;
use App\Property;
use App\UserSubscription;
class SubscriptionController extends Controller
{
    //

public function displayPlans($slug){
    if (Auth::check()) {
        $property=  Property::where('slug', $slug)->first();
        if ($property) {
            $userId = Auth::user()->id;
            if($userId != $property->user_id){
                return redirect()->route('frontuser.property.index');
            }else{
               $alreadySubscribed=UserSubscription::where('user_id', $userId)
               ->where('property_id', $property->id)
               ->where('start_at', '<=', now())
               ->where('end_at', '>=', now())
               ->first();
               if($alreadySubscribed){
                return redirect()->back()->with('message', 'Already subscribed!');
               }else{
                $data['property']=$property; 
                $data['plans']=PlanTypes::where('status', 'active')
                ->with(['subscriptonPlans'=>function($query){
                    $query->where('status', 'active');
                }])->get();
        //                     echo "<pre>"; print_r($data['plans']->toArray()); echo "<pre>";
        // exit;
                return view('dashboard.plans', compact('data'));
               }
            }
        } else {
            return redirect()->route('frontuser.property.index');
        }
    } 
    
}
}
