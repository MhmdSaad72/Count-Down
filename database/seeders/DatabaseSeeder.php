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
          'releaseTime' => '10:10:00',
          'releaseUrl' => 'https://www.google.com',
        ]);
        // create four themes and there images
        $number = ['Space','Geometric','Minimal','Forest'];
        $active = [1,0,0,0];
        for ($i = 0; $i < 4 ; $i++) {
          $theme = Theme::create([
            'name' => $number[$i] . ' Theme',
            'active' => $active[$i]
          ]);
          if ($theme->id != 3 && $theme->id != 1) {
            ThemeImage::create([
              'theme_id' => $theme->id,
              'active' => 1,
              'image' => 'theme-' . ($i+1) .'-bg.jpg' ,
            ]);
          }
        }

        for ($i = 1; $i < 5; $i++) {
          $active = ($i == 1) ? 1 : 0;
          ThemeImage::create([
            'theme_id' => 1,
            'active' => $active,
            'image' => 'theme-1-bg-' . $i . '.jpg' ,
          ]);
        }
        $gradient = ['#06BEB6 40%, #48B1BF','#B993D6 40%, #8CA6DB','#FE7378 40%, #FE977B','#E53935 40%, #E35D5B','#76B852 40%, #8DC26F'];
        for ($i = 0; $i < 5; $i++) {
          ThemeImage::create([
            'theme_id' => 3,
            'gradient' => $gradient[$i]
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
