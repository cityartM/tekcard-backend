<?php

namespace Modules\Company\Repositories;

use Modules\Company\Models\Company;

interface CompanyRepository
{
    /**
     * Get all system companys.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system companys into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Get all system companys with number of users for each company.
     *
     * @return mixed
     */
    public function getAllWithUsersCount();

    /**
     * Find system company by id.
     *
     * @param $id Company Id
     * @return Company|null
     */
    public function find($id);

    /**
     * Find company by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system company.
     *
     * @param array $data
     * @return Company
     */
    public function create(array $data);


    /**
     * Update specified company.
     *
     * @param $id Company Id
     * @param array $data
     * @return Company
     */
    public function update($id, array $data);


    /**
     * WHEN updating company status we ban or activate all its users
     * depending on status received
     * @param $companyId
     * @param $status
     * @return mixed
     */
    public function cascadeUsers($companyId,$status);

    /**
     * Remove company from repository.
     *
     * @param $id Company Id
     * @return bool
     */
    public function delete($id);

    public function getDatatables();
}
