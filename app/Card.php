<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';
    protected $fillable = ['image', 'thumbnail', 'status'];

    public function builders()
    {
        return $this->hasMany(BuilderCard::class);
    }
}
