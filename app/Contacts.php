<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['name', 'phone','email','message', 'message_type','property_id','state_id', 'user_id', 'resolved'];
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function property(){
        return $this->belongsTo('App\Property', 'property_id');
    }

    public function state(){
        return $this->belongsTo('App\States', 'state_id');
    }
}
