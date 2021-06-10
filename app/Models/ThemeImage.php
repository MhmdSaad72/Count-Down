<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeImage extends Model
{
    use HasFactory;

    protected $table = 'theme_images';

    protected $guarded = [];

    public function theme()
    {
      return $this->belongsTo('\App\Models\Theme' , 'theme_id');
    }
}
