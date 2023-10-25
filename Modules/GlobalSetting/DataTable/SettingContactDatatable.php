<?php

namespace Modules\GlobalSetting\DataTable;

use Illuminate\Support\Facades\File;
use Modules\GlobalSetting\Models\SettingContact;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class SettingContactDatatable
{

    public static function columns(): array
    {
        return [
            "icon",
            "display_name",
            "category",
            "user_name",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (SettingContact $settingcontact) {
                    return (new DataTableActions())
                        ->edit(route("settingContacts.edit", $settingcontact->id))
                        ->delete(route("settingContacts.destroy", $settingcontact->id))
                        ->make();
                })
                ->addColumn("icon", function (SettingContact $settingcontact) {
                    $media = $settingcontact->getFirstMedia('Icon contact');
                    $url = $media ? File::get(public_path('storage/'.$media->id.'/'.$media->file_name)) : File::get(public_path('assets/media/logos/logo-3.svg'));
                   // $url = $settingcontact->getFirstMedia('Icon contact')?->getFullUrl() ?? asset('assets/media/logos/logo-3.svg');
                    return (new DataTableActions())->icon($url);
                })
                ->addColumn("display_name", function (SettingContact $settingcontact) {
                    return $settingcontact->display_name ;
                })
                ->addColumn("category", function (SettingContact $settingcontact) {
                    return $settingcontact->category;
                })
                ->addColumn("user_name", function (SettingContact $settingcontact) {
                    return $settingcontact->user->username;
                })
                ->addColumn('created_at', function (SettingContact $settingcontact) {
                    return $settingcontact->created_at ? $settingcontact->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','icon','display_name','category','user_name','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = SettingContact::query();

        return $query->get();
    }

}
