<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;

class SetTimeZone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $generalSetting = GeneralSetting::first();
        $timezone = $generalSetting->timezone ??  'UTC' ;
        date_default_timezone_set($timezone);
        return $next($request);
    }
}
