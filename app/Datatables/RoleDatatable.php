<?php

namespace App\Datatables;

use App\Models\Role;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class RoleDatatable
{

    public static function columns(): array
    {
        return [
            "name",
            "display_name",
            "users_count",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Role $role) {
                    return (new DataTableActions())
                        ->edit(route("roles.edit", $role->id))
                        ->delete(route("roles.destroy", $role->id))
                        ->make();
                })
                ->addColumn("name", function (Role $role) {
                    return (new DataTableActions())->statuses('primary',$role->name);
                })
                ->addColumn("display_name", function (Role $role) {
                    return $role->display_name;
                })
                ->addColumn("users_count", function (Role $role) {
                    return $role->users_count;
                })
                ->addColumn("created_at", function (Role $role) {
                    return $role->created_at->format('Y-m-d');
                })
                ->rawColumns(['action','name','display_name','users_count', 'created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Role::query();
        /*if ($request->has("search") && $request->search != "") {
            $searchTerm = $request->search['value'];
            $query->where('name', 'like', '%'.$searchTerm.'%')
                  ->orWhere('display_name', 'like', '%'.$searchTerm.'%');
        }*/
        return $query->withCount('users')->get();
    }

}
