<?php

namespace Modules\Card\DataTable;

use Illuminate\Support\Facades\File;
use Modules\Card\Models\Shipping;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class ShippingDatatable
{

    public static function columns(): array
    {
        return [
            "is_main",
            "country",
            "state",
            "zip_code",
            "address",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Shipping $shipping) {
                    return (new DataTableActions())
                        ->edit(route("shippings.edit", $shipping->id))
                        ->delete(route("shippings.destroy", $shipping->id))
                        ->make();
                })
                
                ->addColumn("is_main", function (Shipping $shipping) {
                    return $shipping->is_main ;
                })
                ->addColumn("country", function (Shipping $shipping) {
                    return $shipping->country->name;
                })
                ->addColumn("state", function (Shipping $shipping) {
                    return $shipping->state ;
                })
                ->addColumn("zip_code", function (Shipping $shipping) {
                    return $shipping->zip_code  ;
                })
                ->addColumn("address", function (Shipping $shipping) {
                    return $shipping->address  ;
                })
               

                ->rawColumns(['action',"is_main","country","state","zip_code","address",])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Shipping::query();

        return $query->get();
    }

}
