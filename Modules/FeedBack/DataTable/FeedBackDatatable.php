<?php

namespace Modules\FeedBack\DataTable;

use Modules\FeedBack\Models\FeedBack;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class FeedBackDatatable
{

    public static function columns(): array
    {
        return [
            "user",
            "comment",
          ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (FeedBack $feedback) {
                    return (new DataTableActions())
                        ->delete(route("feedback.destroy", $feedback->id))
                        ->make();
                })
                ->addColumn("user", function (FeedBack $feedback) {
                    return $feedback->user->first_name ;
                })
                ->addColumn("comment", function (FeedBack $feedback) {
                    return $feedback->comment;
                })

                ->rawColumns(['action','user','comment'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = FeedBack::query();

        return $query->get();
    }

}
