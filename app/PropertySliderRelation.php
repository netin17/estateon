<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertySliderRelation extends Model
{
    //
    protected $fillable = ['property_id', 'property_slider_id'];
    public function propertySlider()
{
    return $this->belongsTo(PropertySlider::class);
}

public function property()
{
    return $this->belongsTo(Property::class);
}
}
