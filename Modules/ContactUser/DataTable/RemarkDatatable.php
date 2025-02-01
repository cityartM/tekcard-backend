<?php

namespace Modules\ContactUser\DataTable;

use Modules\ContactUser\Models\Remark;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class RemarkDatatable
{

    public static function columns(): array
    {
        return [
            "title",
            "color",
            "user_name",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Remark $remark) {
                    return (new DataTableActions())
                        ->delete(route("remarks.destroy", $remark->id),\Auth::user()->hasPermission('remarks.manage'))
                        ->edit(route("remarks.edit", $remark->id),\Auth::user()->hasPermission('remarks.manage'))
                        ->make();
                })
                ->addColumn("title", function (Remark $remark) {
                    return $remark->title ;
                })
                ->addColumn("color", function (Remark $remark) {
                    return (new DataTableActions())->color($remark->color)  ;
                })
                ->addColumn("user_name", function (Remark $remark) {
                    return $remark->user->username;
                })
                ->addColumn('created_at', function (Remark $remark) {
                    return $remark->created_at ? $remark->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','title','color','user_name','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
{
    $user = auth()->user();
    $query = Remark::query();

    if ($user) {
        // Explicit checks for Admin-IT/Admin
        if ($user->hasRole('Admin-IT') || $user->hasRole('Admin')) {
            return $query->get(); // Admins see all remarks
        }
        // Company users see remarks from their company members
        elseif ($user->hasRole('Company')) {
            $query->whereHas('user', function ($q) use ($user) {
                $q->where('company_id', $user->company_id);
            });
        }
        // All other authenticated users see only their own remarks
        else {
            $query->where('user_id', $user->id);
        }
    }
    // Block unauthenticated users
    else {
        $query->where('id', 0); // Force empty result
    }

    return $query->get();
}

}
