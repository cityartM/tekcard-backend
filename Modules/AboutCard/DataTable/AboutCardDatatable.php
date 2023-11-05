<?php

namespace Modules\AboutCard\DataTable;

use Modules\AboutCard\Models\AboutCard;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class AboutCardDatatable
{

    public static function columns(): array
    {
        return [
            "image",
            "title",
            "description",
            "created_at",
        ];
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (AboutCard $aboutCard) {
                    return (new DataTableActions())
                        ->edit(route("aboutCards.edit", $aboutCard->id))
                        ->delete(route("aboutCards.destroy", $aboutCard->id))
                        ->make();
                })
                ->addColumn("image", function (AboutCard $aboutCard) {
                    $media = $aboutCard->getFirstMedia('about_card');
                    $url = $media ? $media->getUrl() : asset('assets/media/logos/logo-3.svg');

                    return (new DataTableActions())->image($url);
                })
                ->addColumn("title", function (AboutCard $aboutCard) {
                    return $aboutCard->title ;
                })
                ->addColumn("description", function (AboutCard $aboutCard) {
                    return $aboutCard->description;
                })
                
                ->addColumn("created_at", function (AboutCard $aboutCard) {
                    return $aboutCard->created_at->format('Y-m-d');
                })
                ->rawColumns(['action',"image","title","description","created_at",])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = AboutCard::query();

        return $query->get();
    }

}
