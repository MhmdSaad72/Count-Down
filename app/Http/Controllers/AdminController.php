<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GeneralSetting;
use App\Models\Counter;
use App\Models\SocialLink;
use \Carbon\Carbon;
use Auth;

class AdminController extends Controller
{
    /*=======================================================================================
     Display item analysis(all subscribes , new subscribes and all views) in admin dashboard
    =========================================================================================*/
    public function dashboard()
    {
      $startOfMonth = Carbon::now()->startOfMonth();
      $endOfMonth = Carbon::now()->endOfMonth();
      $pageName = 'Dashboard';
      $dashboard = true;
      $all_users = User::where('role','!=',1)->count();
      $new_users = User::where('role','!=',1)->whereBetween('created_at',[$startOfMonth,$endOfMonth])->count();
      $views = GeneralSetting::first()->views;
      $auth = Auth::user();
      return view('admin.dashboard',compact('all_users','new_users','views','pageName','dashboard','auth'));
    }

    /*======================================================
     Display a listing of the subscribers in subscribe page
    =========================================================*/
    public function subscribes()
    {
      $pageName = 'Subscribers';
      $subscribers = true;
      $users = User::where('role','!=',1)->get();
      $auth = Auth::user();
      return view('admin.subscribes',compact('users','pageName','subscribers','auth'));
    }

    /*==============================================
      Show setting form for editing count down page
    ================================================*/
    public function counter()
    {
      $pageName = 'Counter Settings';
      $counter = true ;
      $countDown = Counter::first();
      $countDown->releaseDate = Carbon::parse($countDown->releaseDate)->format('d/m/Y');
      $countDown->releaseHours = Carbon::parse($countDown->releaseHours)->format('H');
      $countDown->releaseMinutes = Carbon::parse($countDown->releaseMinutes)->format('i');
      $auth = Auth::user();
      return view('admin.counter',compact('pageName','counter','auth','countDown'));
    }

    /*=================================================
      Show setting form for editing social links page
    ===================================================*/
    public function social()
    {
      $pageName = 'Social links';
      $social = true ;
      $auth = Auth::user();
      return view('admin.social',compact('pageName','social','auth'));
    }

    /*================================================
      Show admin profile form for editing admin detail
    ===================================================*/
    public function profile()
    {
      $pageName = 'Profile Settings';
      $profile = true ;
      $auth = Auth::user();
      return view('admin.profile',compact('pageName','profile','auth'));
    }

    /*================================================
        Show form for editing general setting page
    ===================================================*/
    public function general_settings()
    {
      $pageName = 'General Page settings';
      $general = true ;
      $auth = Auth::user();
      $generalSetting = GeneralSetting::first();
      return view('admin.general',compact('pageName','general','auth','generalSetting'));
    }

    /*=========================================================
      Function for update all setting existing in theme page
    ===========================================================*/
    public function updateGeneralSetting(Request $request, GeneralSetting $general)
    {
      $this->validate($request,[
        'main_heading' => 'required|max:255',
        'newsletter' => 'required|max:255',
        'submit_button' => 'required|max:255',
        'copyrights' => 'required|max:255',
        'page_name' => 'required|max:255',
        'meta_keywords' => 'nullable|regex:/^[\pL\s]+$/u|max:255',
        'meta_author' => 'nullable|max:255',
        'favicon_image' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg',
        'favicon_text' => 'nullable|max:255',
      ]);

      $requestData = $request->all();
      if ($request->hasFile('favicon_image')) {
        $requestData['favicon_image'] = $request->file('favicon_image')
                                                ->store('uploads', 'public');
      }

      $general->update($requestData);
      return redirect()->back()->with('flash_message','Cool! You\'ve updated your data');
    }

    /*==============================================
       Get (url/link) for specific social media
    ================================================*/
    public static function getSocialUrl($title)
    {
      $social = SocialLink::where('title',$title)->first();
      $url = $social ? $social->url : '' ;
      return $url ;
    }
}
