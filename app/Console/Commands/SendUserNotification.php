<?php

namespace App\Console\Commands;

use App\Helper\Helper;
use App\Models\User;
use Carbon\Carbon;
use App\Services\Notification\Notification;
use Illuminate\Console\Command;

class SendUserNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:smokingReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to user for next smoking';

    private $notifications;

    /**
     * SendUserNotification constructor.
     * @param Notification $firebase
     */
    public function __construct(Notification $notifications)
    {
        parent::__construct();
        $this->notifications = $notifications;
    }

    /**
     * @throws \Kreait\Firebase\Exception\FirebaseException
     * @throws \Kreait\Firebase\Exception\MessagingException
     */
    public function handle()
    {

        $timezones = User::distinct()->get(['timezone'])->toArray();
        $times=[];
        foreach ($timezones as $timezone) {
            $timezoneFormat = \Carbon\Carbon::now($timezone['timezone'])->format('H:i');
            $startTime = Carbon::createFromFormat('H:i', '08:00');
            $time = Carbon::createFromFormat('H:i', $timezoneFormat);
            if($time->gte($startTime)) {
                $times[$timezone['timezone']] = \Carbon\Carbon::now($timezone['timezone'])->format('H:i');
            }
        }
        $desired_keys = array_keys($times);


        // send message to users in test plan
        $usersTestPlan = \App\Models\User::query()->whereHas('plans', function ($query) use($desired_keys) {
            $query->where('start_date', '>=', Carbon::now()->subDays(setting('free_days')))
                ->whereIn('timezone', $desired_keys)
                ->latest();
        });
        $usersTestPlan->whereDoesntHave('subscription')->chunk(500, function ($UsersChunked) {
            $users = $UsersChunked->groupBy('lang');
            //\Log::info('Text plan User'.$users);
            foreach ($users as $key => $user) {
                $deviceToken = $user->pluck('device_token')->toArray();
                //\Log::info($deviceToken);
                $this->notifications->sendMulticast($deviceToken,[
                    'title' => Helper::translate($key, 'Reminder'),
                    'body' => Helper::translate($key, 'It s time to take your cigarettes')
                ]);
            }
        });



        // send message to users that have plan & subscription
        $users = \App\Models\User::query()->whereHas('plans', function ($query) use($desired_keys) {
            $query->where('start_date', '>', Carbon::now()->subDays(30))
                ->whereIn('timezone', $desired_keys)
                ->latest();
        });
        $users->whereHas('subscription')->chunk(500, function ($chunkedUsers) {
            $users = $chunkedUsers->groupBy('lang');
            //\Log::info('User'.$users);
            foreach ($users as $key => $user) {
                $deviceToken = $user->pluck('device_token')->toArray();
                //\Log::info($deviceToken);
                $this->notifications->sendMulticast($deviceToken,[
                    'title' => Helper::translate($key, 'Reminder'),
                    'body' => Helper::translate($key, 'It s time to take your cigarettes')
                ]);
            }
        });




        \Log::info('Sending notifications successfully ');



    }
}
