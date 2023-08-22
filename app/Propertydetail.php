<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propertydetail extends Model
{
    //
    protected $table = 'property_details';
    protected $fillable = [
        'property_id',
        'property_title',
        'property_category',
        'property_feature',
        'bedroom',
        'bathroom',
        'balcony', 
        'kitchen',
        'living_room',
        'furnished',
        'state_id',
        'city_id',
        'property_status',
        'property_age',
        'possesion_by',
        'numbers_of_floors',
        'user_type',
        'cover_parking',
        'open_parking',
        'plot_area',
        'area_measurement',
        'preference',
        'carpet_area',
        'super_area',
        'build_up_area',
        'price',
        'currency',
        'locality',
        'rera_number',
        'govt_tax_include',
        'extra_notes'];

        public function property()
        {
            return $this->belongsTo(Property::class);
        }
}
