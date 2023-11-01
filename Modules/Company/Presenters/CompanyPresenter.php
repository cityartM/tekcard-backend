<?php

namespace Modules\Company\Presenters;

use App\Presenters\Presenter;
use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CompanyPresenter extends Presenter
{

    public function avatar()
    {
        if (! $this->model->avatar) {

            return url('assets/media/avatars/150-26.jpg');
        }
        return Str::contains($this->model->avatar, ['http', 'img'])
            ? $this->model->avatar
            : url("storage/upload/companies/{$this->model->avatar}");
    }


    public function createdAt()
    {
        return $this->model->created_at
            ? Carbon::parse($this->model->created_at)->diffForHumans()
            : 'N/A';
    }

}
