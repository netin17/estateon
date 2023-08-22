<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuilderDetail extends Model
{
    protected $table = 'builder_details';
    protected $fillable = ['user_id', 'builder_id', 'company_name', 'company_logo', 'banner_image', 'description', 'portfolio', 'total_experience', 'total_projects', 'total_flexible_living', 'running_projects', 'completed_projects'];

    public function builder()
    {
        return $this->belongsTo(Builder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
