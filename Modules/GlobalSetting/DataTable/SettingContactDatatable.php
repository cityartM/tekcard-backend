<?php

namespace Modules\GlobalSetting\DataTable;

use Modules\GlobalSetting\Models\SettingContact;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class SettingContactDatatable
{

    public static function columns(): array
    {
        return [
            "display_name",
            "user_name",
            "value",
            "categorie",
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
                ->addColumn("display_name", function (SettingContact $settingcontact) {
                    return $settingcontact->display_name ;
                })
                ->addColumn("user_name", function (SettingContact $settingcontact) {
                    return $settingcontact->user->username;
                })
                ->addColumn("value", function (SettingContact $settingcontact) {
                    return $settingcontact->value;
                })
                ->addColumn("categorie", function (SettingContact $settingcontact) {
                    return $settingcontact->categorie;
                })
                ->addColumn('created_at', function (SettingContact $settingcontact) {
                    return $settingcontact->created_at ? $settingcontact->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','display_name','user_name','value','categorie','created_at'])

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
