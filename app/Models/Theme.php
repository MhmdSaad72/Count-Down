<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $table = 'themes';

    protected $guarded = [];

    public function images()
    {
      return $this->hasMany('\App\Models\ThemeImage','theme_id');
    }

    public function socials()
    {
      return $this->belongsToMany('App\Models\SocialLink','social_theme','theme_id','social_id');
    }

    public function activeImage()
    {
      $image = ThemeImage::where('theme_id',$this->id)->where('active',1)->first();
      $image = $image ? asset('img/' . $image->image) : null ;
      return $image;
    }

    public function checkSocial($title)
    {
      $social = SocialLink::where('title',$title)->first();
      $array = [];
      foreach ($this->socials as $key => $value) {
         ($social->id == $value->id) ?  $array[] = $value->id : '';
      }
      $checked = in_array($social->id,$array) ? true : false ;
      return $checked;
    }

    public function socialUrl($title)
    {
      $social = SocialLink::where('title',$title)->select('url')->first();
      $url = $social ? $social->url : null;
      return $url;
    }
}
