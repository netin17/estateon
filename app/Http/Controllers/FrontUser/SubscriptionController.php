<?php

namespace App\Http\Controllers\FrontUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PlanTypes;
use App\Property;
use App\UserSubscription;
use App\Payment;
use App\User;
use App\SubscriptionPlan;
use App\Traits\CommonTrait;
class SubscriptionController extends Controller
{
    use CommonTrait;
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
                $data['user']=User::where('id', $userId)->first();
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

public function saveUserSubscription(Request $request){
    $postData= $request->all();
    $userId = Auth::user()->id;
    $user=User::where('id', $userId)->first();
    $plan = SubscriptionPlan::where('id', $postData['planId'])->first();
    $startdate = now();
    $payment = Payment::create([
        'user_id' => $userId,
        'txnid' => $postData['txnid'],
        'amount' =>$plan->price,
        'date' => $startdate,
        'name' => $user->name,
        'email' => $user->email,
        'phone' => $user->phone,
        'plan_id' => $postData['planId']
    ]);


    
    
    if($plan->price==0){
        $endDate = date('Y-m-d H:i:s', strtotime("+1 week", strtotime($startdate)));    
    }else{
        $endDate = date('Y-m-d H:i:s', strtotime("+" . $plan->time_in_monthes . " months", strtotime($startdate)));
    }
    
    $usersubscription = UserSubscription::create([
        'user_id' => $userId,
        'plan_id' => $postData['planId'],
        'payment_id' => $payment->id,
        'property_id' =>$postData['propertyId'],
        'start_at' => $startdate, 
        'end_at' => $endDate,
        'status' => '1',
        'notes' => ''
    ]);

    return response()->json(['postData' => $usersubscription], 200);
}

public function transactionHistory(){
    if (Auth::check()) {
        $data = [];
        $userId = Auth::id();
        $data['user']=$this->getUserDetailsById($userId);
        $data['p_count']=$this->getUserPropertyCount($userId);
        $data['transactions']=UserSubscription::where('user_id', $userId)->with(['payment', 'plan'=>function($query){
            $query->with(['planType']);
        }])->paginate();
        //                     echo "<pre>"; print_r($data['transactions']->toArray()); echo "<pre>";
        // exit;
        //$data['property_type'] = PropertyType::get();'
        

        // return view('userdashboard.property.create', compact('data'));
        return view('dashboard.transactionhistory', compact('data'));
    } else {
        return redirect()->route('home.index');
    } 
}
}
