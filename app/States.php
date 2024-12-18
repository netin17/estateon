<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table = 'states';
    protected $fillable = ['name', 'country_id ', 'country_code', 'fips_code','iso2','type', 'latitude', 'longitude', 'flag','	wikiDataId'];

    public function builderCards()
    {
        return $this->hasMany(BuilderCard::class);
    }
    
}
