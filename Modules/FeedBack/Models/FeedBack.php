<?php

namespace Modules\FeedBack\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeedBack extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected static function newFactory()
    {
        return \Modules\FeedBack\Database\factories\FeedBackFactory::new();
    }
}
