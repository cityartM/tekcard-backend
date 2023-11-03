<?php

namespace Modules\Company\DataTable;

use Modules\Company\Models\Company;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class  CompanyDatatable {

    public static function columns(): array
    {
        return [
            "avatar",
            "full_name",
            "phone",
            "bio",
            "country_id",
            "address",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Company $company) {
                    return (new DataTableActions())
                        ->edit(route("companies.edit", $company->id))
                        ->delete(route("companies.destroy", $company->id))
                        ->make();
                })
                ->addColumn("avatar", function (Company $company) {
                    return (new DataTableActions())->avatar($company->present()->avatar, $company->full_name, $company->job_title);
                })
                ->addColumn("status", function (Company $company) {
                    return $company->status ;
                })
                ->addColumn("phone", function (Company $company) {
                    return $company->phone;
                })
                ->addColumn("bio", function (Company $company) {
                    return $company->bio;
                })
                ->addColumn("country_id", function (Company $company) {
                    return $company->country->citizenship;
                })
                ->addColumn("address", function (Company $company) {
                    return $company->address;
                })
                ->addColumn("created_at", function (Company $company) {
                    return $company->created_at->format('Y-m-d');
                })
                ->rawColumns(['action',"avatar","full_name","phone","bio","country_id","address","created_at"])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Company::query();

        return $query->get();
    }

}
