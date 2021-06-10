<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialLink;
use \Carbon\Carbon;

class SocialLinkController extends Controller
{

    /*============================================================
        Function to add all social links displaying by theme
    ==============================================================*/
    public function updateSocial(Request $request)
    {
      $this->validate($request,[
        'facebookUrl' => 'nullable|max:255',
        'twitterUrl' => 'nullable|max:255',
        'instagramUrl' => 'nullable|max:255',
        'youtubeUrl' => 'nullable|max:255',
        'vimeoUrl' => 'nullable|max:255',
        'linkedinUrl' => 'nullable|max:255',
        'behanceUrl' => 'nullable|max:255',
        'pinterestUrl' => 'nullable|max:255',
      ]);
      $requestData = $request->all();
      SocialLink::where('title', 'facebookUrl')->update(['url' => $requestData['facebookUrl']]);
      SocialLink::where('title', 'twitterUrl')->update(['url' => $requestData['twitterUrl']]);
      SocialLink::where('title', 'instagramUrl')->update(['url' => $requestData['instagramUrl']]);
      SocialLink::where('title', 'youtubeUrl')->update(['url' => $requestData['youtubeUrl']]);
      SocialLink::where('title', 'vimeoUrl')->update(['url' => $requestData['vimeoUrl']]);
      SocialLink::where('title', 'linkedinUrl')->update(['url' => $requestData['linkedinUrl']]);
      SocialLink::where('title', 'behanceUrl')->update(['url' => $requestData['behanceUrl']]);
      SocialLink::where('title', 'pinterestUrl')->update(['url' => $requestData['pinterestUrl']]);

      return redirect()->back()->with('flash_message','Cool! You\'ve updated your data');
    }
}
