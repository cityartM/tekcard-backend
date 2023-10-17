<?php

namespace App\Datatables;

use App\Models\User;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class UserDatatable
{

    public static function columns(): array
    {
        return [
            "avatar",
            "name",
            "role",
            "status",
            "last_login",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (User $user) {
                    return (new DataTableActions())
                        ->edit(route("users.edit", $user->id))
                        ->delete(route("users.destroy", $user->id))
                        ->make();
                })
                ->addColumn("avatar", function (User $user) {
                    return (new DataTableActions())->avatar($user->present()->avatar);
                })
                ->addColumn("name", function (User $user) {
                    return $user->username;
                })
                ->addColumn("role", function (User $user) {
                    return $user->role->name;
                })
                ->addColumn("status", function (User $user) {
                    $code = 'primary';
                    switch ($user->status) {
                        case 'Banned':
                            $code = 'danger';
                            break;
                        case 'Unconfirmed':
                            $code = 'gray';
                            break;
                    }
                    return (new DataTableActions())->statuses($code,$user->status);
                })

                ->addColumn("last_login", function (User $user) {
                    return $user->last_login ?? $user->created_at;
                })
                ->rawColumns(['action','avatar','name','role','status', 'last_login'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        return User::query()->get();
    }

}
