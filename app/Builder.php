<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    protected $table = 'builders';
    protected $fillable = ['user_id','name', 'email', 'contact_number', 'company_name', 'registration_number', 'id_proof', 'comment', 'slug','status'];

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
