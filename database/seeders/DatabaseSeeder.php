<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Theme;
use \App\Models\Counter;
use \App\Models\SocialLink;
use \App\Models\GeneralSetting;
use \App\Models\ThemeImage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // admin setting
        User::create([
          'full_name' => 'Jason doe',
          'email' => 'admin@admin.com',
          'password' => \Hash::make(123456789),
          'user_name' => 'Json doe',
          'email_verified_at' => \Carbon\Carbon::now(),
          'role' => 1,
          'security_key' => 'ab5Ea7jZZa3F3jqZRgg8bHtSts37meq28t3AiTFdJMximbNgElfbX6B07PbhgsHta2LT15NvgCDKZXQZvIulj6SHFn8oCsPw8LVPTu5SiQbCDQvde1E1DehSU6DUcoMHCpMvlqzxjj9Q1eDCwOLNsN',
        ]);
        // count down setting
        Counter::create([
          'releaseDate' => '2021-12-29',
          'releaseHours' => '10:00:00',
          'releaseMinutes' => '00:10:00',
          'releaseUrl' => 'https://www.google.com',
        ]);
        // create four themes and there images
        $number = ['One','Two','Three','Four'];
        $active = [1,0,0,0];
        for ($i = 0; $i < 4 ; $i++) {
          $theme = Theme::create([
            'name' => 'Theme ' . $number[$i],
            'active' => $active[$i]
          ]);
          ThemeImage::create([
            'theme_id' => $theme->id,
            'active' => 1,
            'image' => 'theme-' . ($i+1) . '.jpg' ,
          ]);
        }

        for ($i = 1; $i < 7; $i++) {
          ThemeImage::create([
            'theme_id' => 1,
            'image' => 'bg-' . $i . '.jpg' ,
          ]);
        }
        // add all social links
        $socials = SocialLink::all()->count();
        if ($socials == 0) {
          $links = ['https://www.facebook.com','https://www.twitter.com','https://www.instagram.com','https://www.youtube.com','https://www.vimeo.com','https://www.linkedin.com','https://www.behance.com','https://www.pinterest.com'];
          $titles = ['facebookUrl','twitterUrl','instagramUrl','youtubeUrl','vimeoUrl','linkedinUrl','behanceUrl','pinterestUrl'];
          foreach ($titles as $key => $value) {
            SocialLink::create(['title' => $value , 'url' => $links[$key]]);
          }
        }

        // add general setting
        GeneralSetting::create([
          'main_heading' => 'Coming soon',
          'newsletter' => 'Subscribe to our newsletter to know when we launch our website',
          'submit_button' => 'Notify me',
          'copyrights' => '2021 Ionichub.co All rights reserved.',
          'page_name' => 'Coming soon counter',
          'meta_keywords' => 'IonicCounter countdown counter',
          'meta_author' => 'Ionichub',
          'counter_message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.'
        ]);

    }
}
