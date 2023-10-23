<?php

namespace Modules\Plan\DataTable;


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Plan\Models\Plan;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class PlanDatatable
{

    public static function columns(): array
    {
        return [
            "name",
            "type",
            "display_name" => ["display_name->" . LaravelLocalization::getCurrentLocale()],
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Plan $plan) {
                    return (new DataTableActions())
                        ->edit(route("plans.edit", $plan->id))
                        ->delete(route("plans.destroy", $plan->id))
                        ->make();
                })
                ->addColumn("name", function (Plan $plan) {
                    return (new DataTableActions())->statuses('primary',$plan->name);
                })
                ->addColumn("type", function (Plan $plan) {
                    if($plan->type === 'Company'){
                        return (new DataTableActions())->statuses('info',$plan->type);
                    }
                    return (new DataTableActions())->statuses('success',$plan->type);
                })
                ->addColumn("display_name", function (Plan $plan) {
                    return $plan->display_name;
                })
                /*->addColumn("users_count", function (Plan $plan) {
                    return $plan->users_count;
                })*/
                ->addColumn("created_at", function (Plan $plan) {
                    return $plan->created_at->format('Y-m-d');
                })
                ->rawColumns(['action','name','type','display_name', 'created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Plan::query();
        return $query->get();
       // return $query->withCount('users')->get();
    }

}
