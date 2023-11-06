<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;
use App\Models\User;

class Settings extends Plugin
{
    public function sidebar()
    {
        $general = Item::create(__('app.general'))
            ->route('settings.general')
            ->active("settings")
            ->permissions('settings.general');

        $authAndRegistration = Item::create(__('app.auth_&_registration'))
            ->route('settings.auth')
            ->active("settings/auth")
            ->permissions('settings.auth');

        $settingContacts = Item::create(__('app.setting_contact'))
            ->route('settingContacts.index')
            ->active("settings")
            ->permissions('settingContacts.manage');

        $notifications = Item::create(__('app.notifications'))
            ->route('settings.notifications')
            ->active("settings/notifications")
            ->permissions(function (User $user) {
                return $user->hasPermission('settings.notifications');
            });

        $settingTags = Item::create(__('app.tags'))
            ->route('tags.index')
            ->active("settings")
            ->permissions('tags.manage');

        $settingBackground = Item::create(__('app.backgrounds'))
            ->route('backgrounds.index')
            ->active("settings")
            ->permissions('backgrounds.manage');

        $settingAboutCard = Item::create(__('app.aboutcard'))
            ->route('aboutCards.index')
            ->active("settings")
            ->permissions('aboutCards.manage');

        return Item::create(__('app.settings'))
            ->href('#settings-dropdown')
            ->icon('fas fa-cogs')
            ->permissions(['settings.general'])
            ->addChildren([
                $general,
                $settingContacts,
                $settingTags,
                $settingBackground,
                $settingAboutCard,
                //$authAndRegistration,
                //$notifications,
            ]);
    }
}
