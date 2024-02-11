<?php

namespace Modules\CompanyGroups\DataTable;

use Modules\CompanyGroups\Models\CompanyGroup;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class CompanyGroupDatatable
{

    public static function columns(): array
    {
        return [
            "display_name",
            "user_name",
            "company_name",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (CompanyGroup $group) {
                    return (new DataTableActions())
                        ->delete(route("companygroups.destroy", $group->id))
                        ->edit(route("companygroups.edit", $group->id))
                        ->make();
                })
                ->addColumn("display_name", function (CompanyGroup $group) {
                    return (new DataTableActions())->statuses('primary',$group->display_name)  ;
                })
                ->addColumn("user_name", function (CompanyGroup $group) {
                    return $group->user->username;
                })
                ->addColumn("company_name", function (CompanyGroup $group) {
                    return $group->company->full_name;
                })
                ->addColumn('created_at', function (CompanyGroup $group) {
                    return $group->created_at ? $group->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','display_name','user_name','company_name','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $user = auth()->user();
    
        // Check if the user exists and has a company id
        if ($user && $user->company_id) {
            // Retrieve CompanyGroup where company_id matches the user's company id
            return CompanyGroup::where('company_id', $user->company_id)->get();
        }
        
        $query = CompanyGroup::query();

        return $query->get();
    }

}
