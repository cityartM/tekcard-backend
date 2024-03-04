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
                        ->show(route("users.show", $user->id))
                        ->edit(route("users.edit", $user->id))
                        ->delete(route("users.destroy", $user->id))
                        ->make();
                })
                ->addColumn("avatar", function (User $user) {
                    return (new DataTableActions())->avatar($user->present()->avatar, $user->username, $user->email);
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
                    return $user->present()->lastLogin;
                })
                ->rawColumns(['action','avatar','name','role','status', 'last_login'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $user = auth()->user();
    
        // Check if the user has permission to manage companies
        if ($user->hasRole('Company')) {
            // If the user has permission, fetch users only from their company
            return User::where('company_id', $user->company_id)->get();
        } else {
            // If the user doesn't have permission, return all users
            return User::query()->get();
        }
    }

}
