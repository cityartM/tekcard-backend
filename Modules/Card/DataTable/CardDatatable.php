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
                        ->edit(route("cards.edit", $card->id))
                        ->delete(route("cards.destroy", $card->id))
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
        $query = Card::query();

        return $query->get();
    }

}
