<?php

namespace App\Providers;

use App\Repositories\Partner\EloquentPartner;
use App\Repositories\Partner\PartnerRepository;
use App\Repositories\Permission\EloquentPermission;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Role\EloquentRole;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\EloquentUser;
use App\Repositories\User\UserRepository;
use App\View\Components\Admin\AsideComponent;
use App\View\Components\Button\AddButton;
use App\View\Components\Buttons\BackButtonComponent;
use App\View\Components\Buttons\SaveAndCloseButton;
use App\View\Components\Buttons\SaveButton;
use App\View\Components\Buttons\SaveOrUpdateButton;
use App\View\Components\Buttons\UpdateButton;
use App\View\Components\Card\CardBody;
use App\View\Components\Card\CardContent;
use App\View\Components\Card\CardFooter;
use App\View\Components\Card\CardHeader;
use App\View\Components\Card\CardLeft;
use App\View\Components\Card\CardTitle;
use App\View\Components\Card\CardToolbar;
use App\View\Components\Datatable\HtmlStructure;
use App\View\Components\Datatable\Script;
use App\View\Components\Datatable\SearchInput;
use App\View\Components\Fields\FileField;
use App\View\Components\Fields\InputField;
use App\View\Components\Fields\SelectField;
use App\View\Components\Fields\SummernoteField;
use App\View\Components\Fields\TextFieldJson;
use App\View\Components\Fields\TranslationInputField;
use App\View\Components\Fields\TranslationSummernoteField;
use App\View\Components\Languages\LanguageStructure;
use App\View\Components\Languages\LanguageTabComponent;
use App\View\Components\Languages\LanguageTabWizardComponent;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Advice\Repositories\AdviceRepository;
use Modules\Advice\Repositories\EloquentAdvice;

use Modules\Plan\Repositories\PlanRepository;
use Modules\Plan\Repositories\EloquentPlan;

use Modules\Strategy\Repositories\StrategyRepository;
use Modules\Strategy\Repositories\EloquentStrategy;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserRepository::class, EloquentUser::class);
        $this->app->singleton(RoleRepository::class, EloquentRole::class);
        $this->app->singleton(PermissionRepository::class, EloquentPermission::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Blade::component(LanguageTabComponent::class, 'languages-tab');
        Blade::component(LanguageStructure::class, 'language-structure');
        Blade::component(LanguageTabWizardComponent::class, 'languages-tab-wizard');

        Blade::component(CardContent::class, "card-content");
        Blade::component(CardBody::class, "card-body");
        Blade::component(CardHeader::class, "card-header");
        Blade::component(CardTitle::class, "card-title");
        Blade::component(CardToolbar::class, "card-toolbar");
        Blade::component(CardFooter::class, "card-footer");
        Blade::component(CardLeft::class, "card-left");

        Blade::component(HtmlStructure::class, "datatable-html");
        Blade::component(Script::class, "datatable-script");
        Blade::component(SearchInput::class, "datatable-search-input");

        Blade::component(AsideComponent::class, 'admin-aside');
        Blade::component(BackButtonComponent::class, 'back-btn');
        Blade::component(SaveButton::class, 'save-btn');
        Blade::component(UpdateButton::class, 'update-btn');
        Blade::component(AddButton::class, 'add-btn');
        Blade::component(SaveAndCloseButton::class, 'save-and-close-btn');
        Blade::component(SaveOrUpdateButton::class, 'save-or-update-btn');

        Blade::component(TranslationInputField::class, 'translation-input-field');
        Blade::component(TranslationSummernoteField::class, 'translation-summernote-field');
        Blade::component(InputField::class, 'input-field');
        Blade::component(FileField::class, 'file-field');
        Blade::component(SummernoteField::class, 'summernote-field');
        Blade::component(SelectField::class, "select-field");
        Blade::component(TextFieldJson::class, "text-field-json");

        Schema::defaultStringLength(191);

    }
}
