<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
class Property extends Model
{
    //
    protected $table = 'properties';
    protected $fillable = ['name', 'user_id','description', 'address', 'location', 'lat', 'lng', 'type', 'email', 'website', 'contact_number', 'status', 'featured', 'notes', 'hot', 'sort', 'approved', 'slug', 'created_by'];
    protected $hidden = [
        'email', 'website', 'contact_number',
    ];
    public function amenities()
    {
        return $this->hasMany('App\AssignedAmenities', 'property_id');
    }
    public function vastu(){
        return $this->hasOne('App\AssignedVastu', 'property_id');
    }
    public function preferences(){
        return $this->hasMany('App\AssignedPreferences', 'property_id');
    }
    public function property_details(){
        return $this->hasOne('App\Propertydetail', 'property_id');
    }
    public function property_type(){
        return $this->hasOne('App\AssignedTypes', 'property_id');
    }
    public function images(){
        return $this->hasMany('App\Images', 'property_id');
    }
    public function likes(){
        return $this->hasMany('App\Likes', 'property_id');
    }
    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function builder_feature_property(){
        return $this->hasMany('App\BuilderFeatureProperty', 'property_id');
    }

public function userSubscriptions()
{
    return $this->hasMany('App\UserSubscription', 'property_id');
}

    public static function boot() {
        parent::boot();

        static::deleting(function($property) { // before delete() method call this
            $imagesfolder= public_path('uploads\image\property'.$property->id);
             $property->amenities()->get()->each->delete();
             $property->vastu()->get()->each->delete();
             $property->preferences()->get()->each->delete();
             $property->property_details()->get()->each->delete();
             $property->property_type()->get()->each->delete();
             $property->images()->get()->each->delete();
             $property->likes()->get()->each->delete();
             $property->userSubscriptions()->get()->each->delete();
             $property->builder_feature_property()->get()->each->delete();

             //delete images folder
             $deletefolder=File::deleteDirectory($imagesfolder);
             // do the rest of the cleanup...
        });
    }
}
