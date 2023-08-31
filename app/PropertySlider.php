<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertySlider extends Model
{
    //
    protected $fillable = ['name'];
    public function properties()
{
    return $this->belongsToMany(Property::class, 'property_slider_relations');
}
}
