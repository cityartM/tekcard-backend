<?php

namespace Modules\Subscription\DataTable;

use Modules\Subscription\Models\Subscription;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class SubscriptionDatatable
{

    public static function columns(): array
    {
        return [
            "email",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Subscription $subscription) {
                    return (new DataTableActions())
                        ->delete(route("subscriptions.destroy", $subscription->id))
                        ->make();
                })
                ->addColumn("email", function (Subscription $subscription) {
                    return $subscription->email ;
                })
                ->addColumn("created_at", function (Subscription $subscription) {
                    return $subscription->created_at->format('Y-m-d');
                })
                ->rawColumns(['action','email','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Subscription::query();

        return $query->get();
    }

}
