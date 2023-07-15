<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    public $timestamps = false;
    //
    protected $table = 'leads';
    protected $fillable = ['name', 'email', 'phone', 'message', 'property_id', 'subplan_id','viewed','created_at'] ;
    
    const UPDATED_AT = null;
    public function property(){
        return $this->belongsTo('App\Property', 'property_id');
    }
    public function subplan(){
        return $this->belongsTo('App\SubscriptionPlan', 'subplan_id');
    }
  
}
