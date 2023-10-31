<?php

namespace Modules\ContactUser\DataTable;

use Modules\ContactUser\Models\UserContact;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class UserContactDatatable
{

    public static function columns(): array
    {
        return [
           /* "card",*/
            "user",
            "group",
            "remark",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (UserContact $userContact) {
                    return (new DataTableActions())
                        ->delete(route("userContacts.destroy", $userContact->id))
                        ->make();
                })
               /* ->addColumn("card", function (UserContact $userContact) {
                    return $userContact->card_id ;
                })*/
                ->addColumn("user", function (UserContact $userContact) {
                    return $userContact->user_id ;
                })
                ->addColumn("group", function (UserContact $userContact) {
                    return $userContact->group->display_name;
                })
                ->addColumn("remark", function (UserContact $userContact) {
                    return $userContact->remark->title;
                })
                ->addColumn('created_at', function (UserContact $userContact) {
                    return $userContact->created_at ? $userContact->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','user','group','remark','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = UserContact::query();

        return $query->get();
    }

}
