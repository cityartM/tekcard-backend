<?php

namespace App\Presenters;

use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserPresenter extends Presenter
{
    public function name()
    {
        return sprintf("%s %s", $this->model->first_name, $this->model->last_name);
    }

    public function nameOrEmail()
    {
        return trim($this->name()) ?: $this->model->email;
    }

    public function avatar()
    {
        if (! $this->model->avatar) {

            return url('avatar/profile.jpg');
        }
        return Str::contains($this->model->avatar, ['http', 'img'])
            ? $this->model->avatar
            : url("storage/upload/users/{$this->model->avatar}");
    }

    public function birthday()
    {
        return $this->model->birthday
            ? $this->model->birthday
            : 'N/A';
    }


    public function lastLogin()
    {
        return $this->model->last_login
            ? Carbon::parse($this->model->last_login)->diffForHumans()
            : 'N/A';
    }

    public function createdAt()
    {
        return $this->model->created_at
            ? Carbon::parse($this->model->created_at)->diffForHumans()
            : 'N/A';
    }

    /**
     * Determine css class used for status labels
     * inside the users table by checking user status.
     *
     * @return string
     */
    public function labelClass()
    {
        switch ($this->model->status) {
            case UserStatus::ACTIVE:
                $class = 'success';
                break;

            case UserStatus::BANNED:
                $class = 'danger';
                break;

            default:
                $class = 'warning';
        }

        return $class;
    }
}
