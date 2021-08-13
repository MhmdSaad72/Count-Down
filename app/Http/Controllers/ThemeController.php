<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
use App\Models\Theme;
use App\Models\ThemeImage;
use App\Models\SocialLink;
use \Carbon\Carbon;
use Auth;

class ThemeController extends Controller
{
    /*======================================================
     Display a listing of the subscribers in subscribe page
    =========================================================*/
    public function themes()
    {
      $pageName = 'Themes';
      $pageDescription = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.';
      $themes = true;
      $all_themes = Theme::all();
      $auth = Auth::user();
      return view('admin.themes',compact('all_themes','pageName','themes','auth','pageDescription'));
    }

    /*========================================================
      Display the specific theme and show form for editing it
    ===========================================================*/
    public function single_theme($id)
    {
      $singleTheme = Theme::findOrFail($id);
      $pageName = $singleTheme->name . ' Settings';
      $themes = true;
      $auth = Auth::user();
      return view('admin.single-theme',compact('pageName','themes','auth','singleTheme'));
    }

    /*=======================================================
          Update all settings for specific single theme
    =========================================================*/
    public function updateTheme(Request $request, Theme $theme)
    {
      $file = $request->fileUpload ?? null;
      ThemeImage::where('theme_id',$theme->id)->update(['active' => 0]);

      if ($file) {        // case uploade new image
          $fileName = 'uploaded-' . $theme->id . '.jpg';
          $path = public_path().'/img';
          $uplaod = $file->move($path,$fileName);
          $image = ThemeImage::where('image', $fileName)->first();

          if ($image) {
            $image->update(['image' => $fileName , 'theme_id' => $theme->id,  'active' => 1]);
          }else {
            ThemeImage::create(['image' => $fileName , 'theme_id' => $theme->id , 'active' => 1]);
          }

      }else {
        if ($theme->id == 3) {
          $gradient = $request->gradient_color_1 . ' 40%, ' . $request->gradient_color_2 ;
          $gradientImage = ThemeImage::where('theme_id',$theme->id)->where('gradient',$request->themegrad)->first();
          if ($gradientImage && $request->existGradiant == 0) {
            $gradientImage->update(['active' => 1]);
          }else {
            $existGradiant = ThemeImage::where('theme_id',$theme->id)->where('image','gradient')->first();
            if ($existGradiant) {
              $existGradiant->update(['active' => 1 , 'gradient' => $gradient]);
            }else {
              ThemeImage::create(['image' => 'gradient' , 'theme_id' => $theme->id , 'active' => 1 , 'gradient' => $gradient]);
            }
          }
        }else {
          ThemeImage::where('theme_id',$theme->id)->where('image',$request->themebg)->update(['active' => 1]);
        }
      }


      $facebook = isset($request->facebookUrl) ? SocialLink::where('title','facebookUrl')->first() : null ;
      $twitter = isset($request->twitterUrl) ? SocialLink::where('title','twitterUrl')->first() : null ;
      $linkedin = isset($request->linkedinUrl) ? SocialLink::where('title','linkedinUrl')->first() : null ;
      $youtube = isset($request->youtubeUrl) ? SocialLink::where('title','youtubeUrl')->first() : null ;
      $behance = isset($request->behanceUrl) ? SocialLink::where('title','behanceUrl')->first() : null ;
      $vimeo = isset($request->vimeoUrl) ? SocialLink::where('title','vimeoUrl')->first() : null ;
      $pinterest = isset($request->pinterestUrl) ? SocialLink::where('title','pinterestUrl')->first() : null ;
      $instagram = isset($request->instagramUrl) ? SocialLink::where('title','instagramUrl')->first() : null ;

      $socila_ids = [];

      $facebook_id = $facebook ? $socila_ids[] = $facebook->id: null;
      $twitter_id = $twitter ? $socila_ids[] = $twitter->id : null;
      $linkedin_id = $linkedin ? $socila_ids[] = $linkedin->id : null;
      $youtube_id = $youtube ? $socila_ids[] = $youtube->id : null;
      $behance_id = $behance ? $socila_ids[] = $behance->id : null;
      $vimeo_id = $vimeo ? $socila_ids[] = $vimeo->id : null;
      $pinterest_id = $pinterest ? $socila_ids[] = $pinterest->id : null;
      $instagram_id = $instagram ? $socila_ids[] = $instagram->id : null;

      $socila_ids = array_values($socila_ids);
      $theme->socials()->sync($socila_ids);


      return redirect()->back()->with('flash_message' , 'You\'ve updated your data');

    }

    /*===========================================================
      Method to choose/apply only one theme to be the main theme
    =============================================================*/
    public function activeTheme(Request $request,Theme $theme)
    {
      Theme::where('active','>=',0)->update(['active' => 0]);
      $theme->update(['active'=> 1]);
      return redirect()->back()->with('flash_message','You\'ve updated your data');
    }

    /*============================================================================
      Update Main item function to display counter count down (date,hours,minuts)
    ==============================================================================*/
    public function updateCounter(Request $request, Counter $counter)
    {
      $requestData = $request->all();
      $countType = $requestData['countingType'];
      $requestData['releaseDate'] = Carbon::parse($requestData['releaseDate'])->format('Y-m-d');
      $requestData['releaseTime'] = Carbon::parse($requestData['releaseTime'])->format('H:i:s');
      if ($countType == 'progress') {
        $requestData['initialDate'] = Carbon::parse($requestData['initialDate'])->format('Y-m-d');
        $requestData['initialTime'] = Carbon::parse($requestData['initialTime'])->format('H:i:s');
        $requestData['countingType'] = 1 ;
      }else {
        $requestData['initialDate'] = $requestData['initialTime'] = null ;
        $requestData['countingType'] = 0 ;
      }
      $date = Carbon::now()->format('Y-m-d');
      $time = Carbon::now()->format('H:i');


      $this->validate($request,[
        'initialDate' => ($countType == 'progress') ? 'required|date|before_or_equal:releaseDate' : '',
        // 'initialTime' => ($countType == 'progress') ? 'required|date_format:H:i' : '',
        'initialTime' => [($countType == 'progress') ? 'required' : '', ($requestData['initialDate'] == $requestData['releaseDate']) ? 'before:releaseTime' : ''],
        'releaseDate' => 'required|date|after_or_equal:' . $date,
        'releaseTime' => ['required','date_format:H:i' , ($requestData['releaseDate'] == $date) ? 'after:' . $time : ''],
        'releaseUrl' => 'required|url|max:255',
      ]);
      $counter->update($requestData);
      return redirect()->back()->with('flash_message','You\'ve updated your data');
    }
}
