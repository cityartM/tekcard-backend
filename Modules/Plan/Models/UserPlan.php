<?php

namespace Modules\Plan\Models;

use App\Helpers\Helper;
use App\Models\Permission;
use App\Models\User;
use App\Support\Authorization\AuthorizationRoleTrait;
use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Feature\Models\Feature;
use Modules\Plan\Support\PlanTrait;
use Spatie\Translatable\HasTranslations;


class UserPlan extends Model
{
   // use HasGoogleTranslationTrait;
    use HasTranslations;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_plans';

    protected array $translatable = ["display_name"];

    protected $casts = [
        'has_dashboard' => 'boolean',
        'features' => 'array',
    ];

    protected $fillable = ['type','name', 'display_name','price',
        'nbr_user','nbr_card_user','has_dashboard','has_video','has_pdf','has_multiple_image','has_water_mark','has_share_offline','share_with_image','has_scan_ia','has_group_contact','has_scan_location','has_note_contact','has_statistic',
        'duration','purchase_date','expired_date','features','user_id','plan_id'
    ];


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function canAccessDashboard()
    {
        return $this->has_dashboard;
    }

    public function canUploadVideo()
    {
        return $this->has_video;
    }

    public function canUploadPdf()
    {
        return $this->has_pdf;
    }

    public function canUploadMultipleImage()
    {
        return $this->has_multiple_image;
    }
    public function canMakeWaterMark()
    {
        return $this->has_water_mark;
    }
    public function canShareOffline()
    {
        return $this->has_share_offline;
    }

    public function canShareWithImage()
    {
        return $this->share_with_image;
    }

    public function canScanIA()
    {
        return $this->has_scan_ia;
    }
    public function canCreateGroupContact()
    {
        return $this->group_contact;
    }

    public function canScanLocation()
    {
        return $this->has_scan_location;
    }

    public function canNoteContact()
    {
        return $this->has_note_contact;
    }

    public function canViewStatistic()
    {
        return $this->has_statistic;
    }


}
