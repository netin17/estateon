<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuilderCard extends Model
{
    protected $table = 'builder_cards';
    protected $fillable = ['user_id', 'builder_id','state_id', 'city_id', 'card_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function builder()
    {
        return $this->belongsTo(Builder::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
