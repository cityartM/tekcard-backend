<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;
use App\Models\User;

class Settings extends Plugin
{
    public function sidebar()
    {
        $general = Item::create(__('app.General'))
            ->route('settings.general')
            ->active("settings")
            ->permissions('settings.general');

        $authAndRegistration = Item::create(__('app.Auth & Registration'))
            ->route('settings.auth')
            ->active("settings/auth")
            ->permissions('settings.auth');

        $settingContacts = Item::create(__('app.setting_Contacts'))
            ->route('settingContacts.index')
            ->active("settings")
            ->permissions('settingContacts.manage');

        $notifications = Item::create(__('app.Notifications'))
            ->route('settings.notifications')
            ->active("settings/notifications")
            ->permissions(function (User $user) {
                return $user->hasPermission('settings.notifications');
            });

        return Item::create(__('app.Settings'))
            ->href('#settings-dropdown')
            ->icon('fas fa-cogs')
            ->permissions(['settings.general'])
            ->addChildren([
                $general,
                $settingContacts,
                //$authAndRegistration,
                //$notifications,
            ]);
    }
}
