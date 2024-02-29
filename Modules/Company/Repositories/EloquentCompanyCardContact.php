<?php

namespace Modules\Company\Repositories;

use Modules\Company\Models\CompanyCardContact;

class EloquentCompanyCardContact implements CompanyCardContactRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return CompanyCardContact::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return CompanyCardContact::findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): CompanyCardContact
    {
        $companyCardContact = CompanyCardContact::create($data);

        return $companyCardContact;
    }


    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $companyCardContact = $this->find($id);

        $companyCardContact->update($data);

        return $companyCardContact;
    }


    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $companyCardContact = $this->find($id);

        return $companyCardContact->delete();
    }


    public function countUserGroup($company_id,$group_id)
    {
        return CompanyCardContact::where('company_id',$company_id)->where('group_id',$group_id)->count();
    }

    public function checkExistCard($card_id,$company_id)
    {
        return CompanyCardContact::where('card_id',$card_id)->where('company_id',$company_id)->first();
    }


}
