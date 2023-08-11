<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyVisitor extends Model
{
    protected $fillable = [
        'user_id', 'property_id', 'visited_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
