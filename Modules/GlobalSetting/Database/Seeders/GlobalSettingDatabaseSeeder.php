<?php

namespace Modules\GlobalSetting\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\GlobalSetting\Models\SettingContact;
use Modules\GlobalSetting\Support\Enum\ContactType;

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
                'email' => 'Email',
                'phone' => 'Phone',
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

        $baseUrlSocialMedia = [
            'Social Media' => [
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'youtube' => 'https://www.youtube.com/',
                'snapchat' => 'https://www.snapchat.com/',
                'reddit' => 'https://www.reddit.com/',
                'tiktok' => 'https://www.tiktok.com/',
                'twitch' => 'https://www.twitch.tv/',
                'soundcloud' => 'https://soundcloud.com/',
                'spotify' => 'https://www.spotify.com/',
                'vimeo' => 'https://vimeo.com/',
                'flickr' => 'https://www.flickr.com/',
            ],
            'Contact Info' => [
                'email' => 'Email',
                'phone' => 'Phone',
                'whatsapp' => 'https://web.whatsapp.com/',
                'telegram' => 'https://web.telegram.org/',
                'pinterest' => 'https://www.pinterest.com/',
                'tumblr' => 'https://www.tumblr.com/',
                'viber' => 'https://www.viber.com/',
                'line' => 'https://line.me/',
                'qq' => 'https://www.imqq.com/',
            ],
            'Business' => [
                'github' => 'https://github.com/',
                'gitlab' => 'https://gitlab.com/',
                'bitbucket' => 'https://bitbucket.org/',
            ],
            'Personnel' => [
                'wechat' => 'Wechat',
                'skype' => 'Skype',
                'dribbble' => 'https://dribbble.com/',
                'behance' => 'https://www.behance.net/',
                'medium' => 'https://medium.com/',
                ]
        ];
        $i = 1;
        foreach($socialMediaPlatforms as $key => $socialMediaPlatform )
        {
            foreach($socialMediaPlatform as $k => $value)
            {
                \DB::table('setting_contacts')->insert([
                    [
                        'display_name' => $value,
                        'category' => $key,
                        'value' => 'value',
                        'user_id' => 1,
                        'base_url' => $baseUrlSocialMedia[$key][$k],
                        'type' => $k === 'email' ? 'Mail' : ($k === 'phone' ? 'Call' : 'Link'),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    ],
                ]);
                $settingContact = SettingContact::find($i);
                $settingContact->addMedia(public_path('socialMedia/'.$value.'.svg'))->toMediaCollection(ContactType::ICONCONTACT);
                $i++;
            }
        }
    }
}
