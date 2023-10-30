<?php

namespace Modules\Blog\DataTable;

use Modules\Blog\Models\Blog;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class BlogDatatable
{

    public static function columns(): array
    {
        return [
            "id",
            "title",
            "type",
            "status",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Blog $blog) {
                    return (new DataTableActions())
                        ->edit(route("blogs.edit", $blog->id))
                        ->delete(route("blogs.destroy", $blog->id))
                        ->make();
                })
                ->addColumn("id", function (Blog $blog) {
                    return $blog->id ;
                })
                ->addColumn("title", function (Blog $blog) {
                    return $blog->title ;
                })
                ->addColumn("type", function (Blog $blog) {
                    return $blog->type;
                })
                ->addColumn("status", function (Blog $blog) {
                    return $blog->status;
                })
                
                ->addColumn("created_at", function (Blog $blog) {
                    return $blog->created_at->format('Y-m-d');
                })
                ->rawColumns(['action',"id","title","type","status","created_at",])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Blog::query();

        return $query->get();
    }

}
