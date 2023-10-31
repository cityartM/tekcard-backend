<?php

namespace Modules\Company\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Company\Models\Company;

class EloquentCompany implements CompanyRepository
{

    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Company::all();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllWithUsersCount()
    {
        return Company::withCount('users')->get();
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Company::findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): Company
    {

        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['bio'] = Helper::translateAttribute($data['bio']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['bio'] = Helper::translateAttribute($data['bio'] + ['lang' => $lang]);
        }

        $company = Company::create($data);

        return $company;
    }


    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $company = $this->find($id);

        $company->update($data);

        return $company;
    }

    /**
     * @param $companyId
     * @param $status
     * @return mixed|void
     */
    public function cascadeUsers($companyId,$status)
    {
        User::where('company_id', $companyId)
            ->where('status','!=',UserStatus::BANNED)
            ->update(['status' => $status]);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $company = $this->find($id);

        return $company->delete();
    }



    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Company::pluck($column, $key);
    }

    /**
     * @param $name
     * @param $lang
     * @return Company|mixed
     */
    public function findByName($name)
    {
        return Company::where('name', $name)->first();
    }

}

