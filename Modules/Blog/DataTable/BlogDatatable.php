<?php

namespace Modules\Blog\DataTable;

use Illuminate\Support\Facades\File;
use Modules\Blog\Models\Blog;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class BlogDatatable
{

    public static function columns(): array
    {
        return [
            "thumbnail",
            "title",
            "tags",
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
                ->addColumn("thumbnail", function (Blog $blog) {
                    $media = $blog->getFirstMedia('thumbnail');

                    $url = $media ? $media->getFullUrl() : public_path('assets/media/logos/logo-3.svg');

                    return (new DataTableActions())->image($url);
                })
                ->addColumn("title", function (Blog $blog) {
                    return $blog->title ;
                })
                ->addColumn("tags", function (Blog $blog) {
                    $tags = $blog->tags()->pluck('name')->toArray();

                    return (new DataTableActions())->tags($tags);
                })
                ->addColumn("status", function (Blog $blog) {
                    return $blog->status;
                })

                ->addColumn("created_at", function (Blog $blog) {
                    return $blog->created_at->format('Y-m-d');
                })
                ->rawColumns(['action',"thumbnail","title","tags","status","created_at",])

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
