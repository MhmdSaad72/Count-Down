<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $table = 'social_links';

    protected $guarded = [];


    public function themes()
    {
      return $this->belongsToMany('App\Models\Theme','social_theme','social_id','theme_id');
    }
}
