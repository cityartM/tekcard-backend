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
            "reference_link",
            "quantity",
            "color",
            "company",
            "status_order",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (CardOrder $orderCard) {
                    return (new DataTableActions())
                        ->delete(route("cardOrders.destroy", $orderCard->id))
                        ->make();
                })

                ->addColumn("card", function (CardOrder $orderCard) {
                    return $orderCard->card?->full_name;
                })
                ->addColumn("reference_link", function (CardOrder $orderCard) {
                    return $orderCard->card?->reference_link;
                })
                ->addColumn("quantity", function (CardOrder $orderCard) {
                    return $orderCard->quantity ;
                })
                ->addColumn("color", function (CardOrder $orderCard) {
                    return  (new DataTableActions())->color($orderCard->color)  ;
                })
                ->addColumn("company", function (CardOrder $orderCard) {

                    if ($orderCard->company) {
                      return $orderCard->company?->full_name;

                    } else {
                        return 'N/A';
                    }
                })
                ->addColumn("status_order", function (CardOrder $orderCard) {
                    return $orderCard->status;
                })
                ->addColumn("created_at", function (CardOrder $orderCard) {
                    return $orderCard->created_at->format('Y-m-d');
                })

                ->rawColumns(['action',"card","reference","quantity","color","company","status_order","created_at",])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $user = auth()->user();
        $query = CardOrder::query();
    
        if ($user->hasRole('Admin-IT') || $user->hasRole('Admin')) {
            // Admins see all card orders
        } elseif ($user->hasRole('Company')) {
            // Company users see card orders from users in their company
            $query->whereHas('card.user', function ($q) use ($user) {
                $q->where('company_id', $user->company_id);
            });
        } else {
            // Regular users only see their own card orders
            $query->whereHas('card', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }
    
        return $query->get();
    }

}
