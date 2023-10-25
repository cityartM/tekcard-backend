<?php

namespace Modules\ContactUser\DataTable;

use Modules\ContactUser\Models\Group;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class GroupDatatable
{

    public static function columns(): array
    {
        return [
            "display_name",
            "user_name",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Group $group) {
                    return (new DataTableActions())
                        ->delete(route("groups.destroy", $group->id))
                        ->edit(route("groups.edit", $group->id))
                        ->make();
                })
                ->addColumn("display_name", function (Group $group) {
                    return (new DataTableActions())->statuses('primary',$group->display_name)  ;
                })
                ->addColumn("user_name", function (Group $group) {
                    return $group->user->username;
                })
                ->addColumn('created_at', function (Group $group) {
                    return $group->created_at ? $group->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','display_name','user_name','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Group::query();

        return $query->get();
    }

}
