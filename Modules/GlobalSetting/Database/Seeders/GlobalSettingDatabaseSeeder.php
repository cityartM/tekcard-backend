<?php

namespace Modules\GlobalSetting\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GlobalSettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $socialMediaPlatforms = [
            'Social Media' => [
                'facebook' => 'Facebook',
                'instagram' => 'Instagram',
                'linkedin' => 'Linkedin',
                'youtube' => 'Youtube',
                'snapchat' => 'Snapchat',
                'reddit' => 'Reddit',
                'tiktok' => 'Tiktok',
                'twitch' => 'Twitch',
                'soundcloud' => 'Soundcloud',
                'spotify' => 'Spotify',
                'vimeo' => 'Vimeo',
                'flickr' => 'Flickr',
            ],
            'Contact Info' => [
                'whatsapp' => 'Whatsapp',
                'telegram' => 'Telegram',
                'pinterest' => 'Pinterest',
                'tumblr' => 'Tumblr',
                'viber' => 'Viber',
                'line' => 'Line',
                'qq' => 'QQ',
            ],
            'Business' => [
                'github' => 'Github',
                'gitlab' => 'Gitlab',
                'bitbucket' => 'Bitbucket',
            ],
            'Personnel' => [
                'wechat' => 'Wechat',
                'skype' => 'Skype',
                'dribbble' => 'Dribbble',
                'behance' => 'Behance',
                'medium' => 'Medium',
            ],
        ];

        foreach($socialMediaPlatforms as $key => $socialMediaPlatform )
        {
            foreach($socialMediaPlatform as $k => $value)
            {
               // dd($value);
                    \DB::table('setting_contacts')->insert([
                        [
                            'display_name' => $value,
                            'category' => $key,
                            'value' => 'value',
                            'user_id' => 1,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        ],

                    ]);
            }
        }
    }
}
