<?php

namespace Modules\Address\DataTable;

use App\Support\DataTable\DataTableActions;
use Exception;
use Log;
use Modules\Address\Models\Wilaya;
use Modules\Address\Models\Country;
use Carbon\Carbon;

class WilayaDatatable
{

    public static function columns(): array
    {
        return [
            "name",
            "code",
            "delivery_price",
            "country",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Wilaya $wilaya) {
                    return (new DataTableActions())
                        ->edit(route("address.edit", $wilaya),\Auth::user()->hasPermission('address.manage'))
                        ->delete(route("address.destroy", $wilaya),\Auth::user()->hasPermission('address.manage'))
                        ->make();
                })
                ->addColumn("name", function (Wilaya $wilaya) {
                    return $wilaya->name;
                })

                ->addColumn("delivery_price", function (Wilaya $wilaya) {
                    return (new DataTableActions())->money($wilaya->delivery_price);
                })

                ->addColumn("country", function (Wilaya $wilaya) {
                    return $wilaya->country?->name;
                })
                ->rawColumns(['action','code','delivery_price','country'])    

                ->make(true);

        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Wilaya::query()->with('country');
        return $query->get();
    }

}
