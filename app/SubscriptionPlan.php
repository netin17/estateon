<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $table = 'subscription_plans';
    protected $fillable = ['name', 'price', 'plan_type_id', 'time_in_monthes','features','status', 'description', 'title'];

    public function planType(){
        return $this->belongsTo('App\PlanTypes', 'plan_type_id');
    }

}
