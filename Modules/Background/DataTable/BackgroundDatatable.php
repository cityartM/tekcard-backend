<?php

namespace Modules\Background\DataTable;

use Modules\Background\Models\Background;
use App\Support\DataTable\DataTableActions;
use Illuminate\Support\Facades\File;
use Exception;
use Log;


class BackgroundDatatable
{

    public static function columns(): array
    {
        return [
            'background',
            'type',
            'created_at',
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (Background $background) {
                    return (new DataTableActions())
                        ->edit(route("backgrounds.edit", $background->id))
                        ->delete(route("backgrounds.destroy", $background->id))
                        ->make();
                })

                ->addColumn("background", function (Background $background) {
                    $media = $background->getFirstMedia('background');
                    $url = $media ? $media->getUrl() : asset('assets/media/logos/logo-3.svg');

                    return (new DataTableActions())->image($url);
                })
                ->addColumn("type", function (Background $background) {
                    return $background->type;
                })

                ->addColumn("created_at", function (Background $background) {
                    return $background->created_at->format('Y-m-d');
                })
                ->rawColumns(['action','background','type','created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = Background::query();

        return $query->get();
    }

}
