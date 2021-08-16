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
        $releaseDate = Carbon::parse($counter->releaseDate);
        $releaseTime = Carbon::parse($counter->releaseTime);
        if ($counter->countingType == 'progress') {
          $initialDate = Carbon::parse($counter->initialDate);
          $initialTime = Carbon::parse($counter->initialTime);

          $days = (int) $releaseDate->diffInDays($initialDate);
          $hours = $releaseTime->diffInHours($initialTime);
          $minutes = $releaseTime->subHours($hours)->diffInMinutes($initialTime);
          $diffDay = (int) $now->diffInDays($initialDate);
          $diffHour = (int) $now->diffInHours($initialTime);
          $diffMinute = (int) $now->subHours($diffHour)->diffInMinutes($initialTime);
          $first = $diffDay + ($diffHour / 24 ) + ($diffMinute / (24 * 60));
          $second = $days + ($hours / 24 ) + ($minutes / (24 * 60));
          $progressWidth = (int) ceil( $first/ $second * 100) ;
          $finalInitialDate = $initialDate->format('Y-m-d') . ' ' . $initialTime->format('H:i:s');
        }

        $deadline = $releaseDate->format('Y-m-d') . ' ' . $releaseTime->format('H:i:s');
        $releaseUrl = $counter->releaseUrl;
        $progressWidth = isset($progressWidth) ? $progressWidth : null ;
        $progressMessage = isset($progressWidth) ? 'Released in ' . $days .' days - ' . $hours . ' hrs - ' . $minutes . ' mins' : null ;
        $finalInitialDate = isset($finalInitialDate) ? $finalInitialDate : null;

        $this->reloadDatetime($deadline,$counter,$now);

        return view('home', compact('themeOne','themeTwo','themeThree','themeFour','generalSetting','deadline','releaseUrl','progressWidth','progressMessage', 'finalInitialDate'));
    }

    /*=================================================================
       Update next release (date,hours,minuts) after datetime was over
    ===================================================================*/
    public function reloadDatetime($releaseDate,$counter,$now)
    {
      if ($now >= $releaseDate) {
        $nextDate = Carbon::parse($releaseDate)->addDays(365);
        $counter->update(['releaseDate' => $nextDate]);
      }
    }
}
