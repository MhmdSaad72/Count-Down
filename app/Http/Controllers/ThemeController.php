<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('themes.index');
    }

    public function remainTime()
    {
      $date = \Carbon\Carbon::now()->format('Y h i');
      $text  =  'jkhkjjjhkjkhkjh';
      return response()->json(['date' => $date,
    'text' => $text]);
    }
}
