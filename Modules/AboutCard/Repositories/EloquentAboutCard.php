<?php

namespace Modules\AboutCard\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\AboutCard\Models\AboutCard;


use Modules\AboutCard\DataTable\AboutCardDatatable;
use DateTime;

class EloquentAboutCard implements AboutCardRepository
{

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return AboutCard::all();;
    }

    public function index()
    {
        return AboutCard::all();;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return AboutCard::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $AboutCard= AboutCard::findOrFail($id);


        return $AboutCard->delete();
    }


    public function getDatatables():AboutCardDatatable
    {
        return new AboutCardDatatable();
    }

    public function create($data)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
        $data['description'] = Helper::translateAttribute($data['description'] + ['lang' => $lang]);

        return AboutCard::create($data);

    }


    public function update($id,$data)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
        $data['description'] = Helper::translateAttribute($data['description'] + ['lang' => $lang]);
        $aboutCard = $this->find($id);

        $aboutCard->update($data);

        return $aboutCard;
    }


}

