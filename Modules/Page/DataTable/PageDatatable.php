<?php

namespace Modules\Page\DataTable;

use Illuminate\Support\Facades\File;
use Modules\Page\Models\Page;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class PageDatatable
{

    public static function columns(): array
    {
        return [
            "title",
            "short_description",
           
            ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Page $page) {
                    return (new DataTableActions())
                        ->edit(route("pages.edit", $page->id),\Auth::user()->hasPermission('pages.edit'))
                        /*->delete(route("pages.destroy", $page->id),\Auth::user()->hasPermission('pages.destroy'))*/
                        ->make();
                })
                
                ->addColumn("title", function (Page $page) {
                    return $page->title ;
                })
                ->addColumn("short_description", function (Page $page) {
                    return $page->short_description ;
                })

                
                ->rawColumns(['action',"title","short_description",])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Page::query();

        return $query->get();
    }

}
