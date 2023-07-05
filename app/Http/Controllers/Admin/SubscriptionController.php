<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SubscriptionPlan;
use App\UserSubscription;
use App\PlanTypes;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $plans = SubscriptionPlan::where('plan_type_id', $id)->get();
        return view('admin.subsription_plans.index', compact(['plans', 'id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       
        return view('admin.subsription_plans.create', compact(['id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $data = $request->all();
        $plan = SubscriptionPlan::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'plan_type_id' => $id,
            'time_in_monthes' => $data['time_in_monthes'],
            'features' => $data['features'],
            'status' => $data['status']
        ]);
        return redirect()->route('admin.subscription.index', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plan = SubscriptionPlan::where('id', $id)->first();
        return view('admin.subsription_plans.show', compact(['plan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = SubscriptionPlan::where('id', $id)->first();
        return view('admin.subsription_plans.edit', compact(['plan']));
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
        $plan = SubscriptionPlan::findOrFail($id);
        $plan->update($request->all());

        return redirect()->route('admin.subscription.index',['id'=>$request->input('plan_type_id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = SubscriptionPlan::where('id', $id)->update(['status'=>0]);
        return redirect()->route('admin.subscription.index');
    }

    public function usersubscription(Request $request){
        $params = $request->all();
        $subscriptions=UserSubscription::query();
        if(isset($params['active'])){
            if($params['active']==true){
                $subscriptions->where('status', 1);
            }
        }
        $usersubscription = $subscriptions->with(['user', 'plan', 'payment'])->paginate(10);
        return view('admin.usersubscription.index', compact(['usersubscription', 'params']));
    }

    public function subscriptiondetail($id){
        $usersubscription = UserSubscription::where('id', $id)->with(['user', 'plan', 'payment'])->first();
    //    echo "<pre>"; print_r($usersubscription->toArray());
    //    exit;
        return view('admin.usersubscription.show', compact(['usersubscription']));
    }

    public function planTypes(){
        $plan_types=PlanTypes::get();
        return view('admin.plantype.index', compact(['plan_types']));
    }   

    public function createPlanType(){
        return view('admin.plantype.create');
    }

    public function storePlanType(Request $request){
        $validatedData = $request->validate([
            'status' => 'required',
            'name' => 'required|unique:plan_types,name',
            // Add more fields and rules as needed
        ]);
          // Create a new instance of the model and assign the form data
    $formData = new PlanTypes;
    $formData->name = $request->input('name');
    $formData->status = $request->input('status');
    $formData->save();

    // Redirect the user to a success page or another appropriate location
    return redirect()->route('admin.subscription.plan');
    }

    public function getPlantype($id){

    }

    public function updatePlantype(Request $request){
        
    }
}
