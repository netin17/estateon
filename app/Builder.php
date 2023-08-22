<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    protected $table = 'builders';
    protected $fillable = ['user_id','name', 'contact_number', 'registration_number', 'id_proof', 'comment', 'status'];

    public function details()
    {
        return $this->hasOne(BuilderDetail::class);
    }

    public function cards()
    {
        return $this->hasMany(BuilderCard::class);
    }

    public function featureProperties()
    {
        return $this->hasMany(BuilderFeatureProperty::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
