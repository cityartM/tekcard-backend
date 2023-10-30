<?php

namespace Modules\Tag\DataTable;

use Modules\Tag\Models\Tag;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class TagDatatable
{

    public static function columns(): array
    {
        return [
            "id",
            "name",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Tag $tag) {
                    return (new DataTableActions())
                        ->edit(route("tags.edit", $tag->id))
                        ->delete(route("tags.destroy", $tag->id))
                        ->make();
                })
                ->addColumn("id", function (Tag $tag) {
                    return $tag->id ;
                })
                ->addColumn("name", function (Tag $tag) {
                    return $tag->name ;
                })
                ->addColumn("created_at", function (Tag $tag) {
                    return $tag->created_at->format('Y-m-d');
                })
                ->rawColumns(['action','id','name','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Tag::query();

        return $query->get();
    }

}
