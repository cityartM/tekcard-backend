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
            "GroupName",
            "UserName",
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
                        ->make();
                })
                ->addColumn("GroupName", function (Group $group) {
                    return $group->display_name ;
                })
                ->addColumn("UserName", function (Group $group) {
                    return $group->user->username;
                })
                ->addColumn('created_at', function (Group $group) {
                    return $group->created_at ? $group->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','GroupName','UserName','created_at'])

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
