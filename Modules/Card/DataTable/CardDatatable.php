<?php

namespace Modules\Card\DataTable;

use Illuminate\Support\Facades\File;
use Modules\Card\Models\Card;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class CardDatatable
{

    public static function columns(): array
    {
        return [
            "reference",
            "name",
            "full_name",
            "company_name",
            "job_title",
            "user",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Card $card) {
                    return (new DataTableActions())
                        ->edit(route("cards.edit", $card->id),\Auth::user()->hasPermission('cards.manage'))
                        ->delete(route("cards.destroy", $card->id),\Auth::user()->hasPermission('cards.manage'))
                        ->make();
                })

                ->addColumn("reference", function (Card $card) {
                    return $card->reference ;
                })
                ->addColumn("name", function (Card $card) {
                    return $card->name ;
                })
                ->addColumn("full_name", function (Card $card) {
                    return $card->full_name ;
                })
                ->addColumn("company_name", function (Card $card) {
                    return $card->company_name  ;
                })
                ->addColumn("job_title", function (Card $card) {
                    return $card->job_title  ;
                })
                ->addColumn("user", function (Card $card) {
                    return $card->user->first_name;
                })

                ->rawColumns(['action',"reference","name","full_name","company_name","job_title","user",])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $user = auth()->user();
        $query = Card::query();
    
        if ($user) {
            // Explicit separate checks for Admin-IT and Admin
            if ($user->hasRole('Admin-IT') || $user->hasRole('Admin')) {
                return $query; // Admins see all cards
            }
            // Company users see company cards
            elseif ($user->hasRole('Company')) {
                $query->whereHas('user', function ($q) use ($user) {
                    $q->where('company_id', $user->company_id);
                });
            }
            // All other authenticated users see only their own cards
            else {
                $query->where('user_id', $user->id);
            }
        }
        // Block guests (unauthenticated users)
        else {
            $query->where('id', 0);
        }
    
        return $query;
    }

}
