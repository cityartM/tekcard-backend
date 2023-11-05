<?php

namespace Modules\Card\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Background\Models\Background;
use Modules\Company\Models\Company;

class Card extends Model
{
    use HasFactory ;

    protected $fillable = ['reference','name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color', 'is_single_link', 'single_link_contact_id', 'user_id'];

    protected $casts = [
        'is_single_link' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function background()
    {
        return $this->belongsTo(Background::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
