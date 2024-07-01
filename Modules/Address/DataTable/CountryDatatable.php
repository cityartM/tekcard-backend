<?php

namespace Modules\Address\DataTable;

use App\Support\DataTable\DataTableActions;
use Exception;
use Log;
use Modules\Address\Models\Country;
use Carbon\Carbon;

class CountryDatatable
{

    public static function columns(): array
    {
        return [
            "flag",
            "name",
            "display",
            "delivery_price",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Country $country) {
                    return (new DataTableActions())
                        ->edit(route("country.edit", $country),\Auth::user()->hasPermission('address.manage'))
                        ->delete(route("country.destroy", $country),\Auth::user()->hasPermission('address.manage'))
                        ->make();
                })
                ->addColumn("flag", function (Country $country) {

                    $url = file_exists("flags/".$country->flag)? url("flags/".$country->flag): asset('assets/media/logos/varieco_preview.png');
                    return (new DataTableActions())->avatar($url, '', null);
                })
                ->addColumn("name", function (Country $country) {
                    return $country->name;
                })

                ->addColumn("display", function (Country $country) {
                    $code = 'success';
                    $status=trans('yes');
                    $country->display == false ?  $code = 'danger' : $code;
                    $country->display == false ?  $status = trans('no') : $status;

                    return (new DataTableActions())->statuses($code, $status);
                })
                ->rawColumns(['action','flag','name','display','delivery_price'])

                ->make(true);

        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Country::query();
        return $query->get();
    }

}
