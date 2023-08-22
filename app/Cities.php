<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name', 'state_id ', 'state_code','country_id ', 'country_code', 'latitude', 'longitude', 'flag','	wikiDataId'];
    
    public function builderCards()
    {
        return $this->hasMany(BuilderCard::class);
    }
}
