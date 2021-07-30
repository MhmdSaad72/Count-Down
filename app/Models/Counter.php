<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;


    protected $table = 'counters';

    protected $guarded = [];

    public function getCountingTypeAttribute($attribute)
    {
      return [
        '0' => 'counter',
        '1' => 'progress',
      ][$attribute];
    }
}
