<?php

namespace Modules\ContactUser\DataTable;

use Modules\ContactUser\Models\Remark;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class RemarkDatatable
{

    public static function columns(): array
    {
        return [
            "title",
            "color",
            "user_name",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Remark $remark) {
                    return (new DataTableActions())
                        ->delete(route("remarks.destroy", $remark->id))
                        ->edit(route("remarks.edit", $remark->id))
                        ->make();
                })
                ->addColumn("title", function (Remark $remark) {
                    return $remark->title ;
                })
                ->addColumn("color", function (Remark $remark) {
                    return (new DataTableActions())->color($remark->color)  ;
                })
                ->addColumn("user_name", function (Remark $remark) {
                    return $remark->user->username;
                })
                ->addColumn('created_at', function (Remark $remark) {
                    return $remark->created_at ? $remark->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','title','color','user_name','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Remark::query();

        return $query->get();
    }

}
