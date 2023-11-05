<?php

namespace Modules\AboutCard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Controllers\Api\ApiController;
use Modules\AboutCard\Models\AboutCard;
use LaravelLocalization;
use Modules\AboutCard\Http\Requests\CreateAboutCardRequest;
use Spatie\MediaLibrary\Models\Media;
use Modules\AboutCard\Repositories\AboutCardRepository;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use Modules\AboutCard\Http\Resources\AboutCardResource;


class AboutCardApiController extends ApiController
{

    private $aboutCard;

    function __construct(AboutCardRepository $aboutCard)
    {
        $this->aboutCard= $aboutCard;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $aboutCards = AboutCard::all();

        return $this->respondWithSuccess([
            'aboutCard' => AboutCardResource::collection($aboutCards),
        ],  'aboutCard request created successfully.',200);
    }


}
