<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\GeneralSetting;
use App\Models\Counter;
use Carbon\Carbon;

class HomeController extends Controller
{
    /*=================================
          Display the home page
    ===================================*/
    public function index()
    {
        $themeOne = Theme::where('name','Theme One')->where('active',1)->first();
        $themeTwo = Theme::where('name','Theme Two')->where('active',1)->first();
        $themeThree = Theme::where('name','Theme Three')->where('active',1)->first();
        $themeFour = Theme::where('name','Theme Four')->where('active',1)->first();

        $generalSetting = GeneralSetting::first();
        $count = ($generalSetting->views) + 1 ;
        $generalSetting->update(['views' => $count]);

        $counter = Counter::first();

        $now = Carbon::now();
        $day = Carbon::parse($counter->releaseDate)->format('Y-m-d');
        $hour = Carbon::parse($counter->releaseHours)->format('H');
        $minute = Carbon::parse($counter->releaseMinutes)->format('i');

        $deadline = $day . ' ' . $hour . ':' . $minute . ':00';
        $releaseUrl = $counter->releaseUrl;

        $this->reloadDatetime($deadline,$counter,$now);

        return view('home',compact('themeOne','themeTwo','themeThree','themeFour','generalSetting','deadline','releaseUrl'));
    }

    /*=================================================================
       Update next release (date,hours,minuts) after datetime was over
    ===================================================================*/
    public function reloadDatetime($releaseDate,$counter,$now)
    {
      if ($now >= $releaseDate) {
        $nextDate = Carbon::parse($releaseDate)->addDays(365);
        $counter->update(['releaseDate' => $nextDate]);
        return redirect()->back();
      }
    }
}
