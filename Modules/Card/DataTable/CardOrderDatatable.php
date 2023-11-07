<?php

namespace Modules\Card\DataTable;

use Illuminate\Support\Facades\File;
use Modules\Card\Models\CardOrder;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class CardOrderDatatable
{

    public static function columns(): array
    {
        return [
            "card",
            "quantity",
            "color",
            "company",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (CardOrder $card) {
                    return (new DataTableActions())
                        ->edit(route("cardOrders.edit", $card->id))
                        ->delete(route("cardOrders.destroy", $card->id))
                        ->make();
                })
                
                ->addColumn("card", function (CardOrder $card) {
                    return $card->card->full_name ;
                })
                ->addColumn("quantity", function (CardOrder $card) {
                    return $card->quantity ;
                })
                ->addColumn("color", function (CardOrder $card) {
                    return $card->color ;
                })
                ->addColumn("company", function (CardOrder $card) {
                    return $card->company->full_name ;
                })
                ->addColumn("created_at", function (Blog $blog) {
                    return $blog->created_at->format('Y-m-d');
                })

                ->rawColumns(['action',"card","quantity","color","company","created_at",])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = CardOrder::query();

        return $query->get();
    }

}
