<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    //
    protected $table = 'likes';
    protected $fillable = ['user_id', 'property_id'];

    public function property(){
        return $this->belongsTo('App\Property', 'property_id');
    }
}
