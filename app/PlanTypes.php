<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanTypes extends Model
{
    protected $table = 'plan_types';
    protected $fillable = ['name','status'];
    public function subscriptonPlans(){
        return $this->hasmany('App\SubscriptionPlan', 'plan_type_id'); 
    }
}
