<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $table = 'general_settings';

    protected $fillable = [ 'main_heading','newsletter','submit_button','copyrights','page_name','meta_keywords','meta_author','favicon_image','meta_description','views','timezone','counter_message'];
}
