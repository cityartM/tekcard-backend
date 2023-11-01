<?php

namespace Modules\Plan\Repositories;

use Modules\Plan\Models\Plan;

interface UserPlanRepository
{
    /**
     * Get all system user plans.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();


    /**
     * Create a new user plan.
     *
     * @param array $data
     * @return \Modules\Plan\Models\Plan
     */

    public function create(array $data);


}
