<?php

namespace App\Providers;

use Vanguard\Plugins\VanguardServiceProvider as BaseVanguardServiceProvider;

class PluginServiceProvider extends BaseVanguardServiceProvider
{
    /**
     * List of registered plugins.
     *
     * @return array
     */
    protected function plugins()
    {
        return [
            \App\Support\Plugins\Companies::class,
           // \App\Support\Plugins\CompaneList::class,
            \App\Support\Plugins\Cards::class,
            \App\Support\Plugins\Users::class,
            \App\Support\Plugins\Settings::class,
            \App\Support\Plugins\RolesAndPermissions::class,
            \App\Support\Plugins\PlansAndFeatures::class,
            \App\Support\Plugins\Address::class,
            \App\Support\Plugins\Subscriptions::class,
            \App\Support\Plugins\ContactUs::class,
            \App\Support\Plugins\FeedBack::class,
            \App\Support\Plugins\Blogs::class,
            \App\Support\Plugins\Translations::class
        ];
    }

    /**
     * Dashboard widgets.
     *
     * @return array
     */
    protected function widgets()
    {
        return [];
    }
}
