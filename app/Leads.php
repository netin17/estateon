<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads';
    protected $fillable = ['name', 'email', 'phone', 'message', 'property_id', 'user_id','subplan_id','viewed'] ;
    
    public function property(){
        return $this->belongsTo('App\Property', 'property_id');
    }
    public function subplan(){
        return $this->belongsTo('App\SubscriptionPlan', 'subplan_id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
  
}
