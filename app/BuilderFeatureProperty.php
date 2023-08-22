<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuilderFeatureProperty extends Model
{
    protected $table = 'builder_feature_properties';
    protected $fillable = ['user_id', 'builder_id', 'city_id', 'property_id', 'builder_card_id', 'status'];

    public function builder()
    {
        return $this->belongsTo(Builder::class);
    }

    public function card()
    {
        return $this->belongsTo(BuilderCard::class, 'builder_card_id');
    }
}
