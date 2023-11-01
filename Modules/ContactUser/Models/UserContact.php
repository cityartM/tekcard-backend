<?php

namespace Modules\ContactUser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserContact extends Model
{
    use HasFactory;

    protected $table = 'user_contacts';

   /* protected $fillable = ['user_id', 'card_id', 'group_id', 'remark_id'];*/

   protected $fillable = ['user_id', 'group_id', 'remark_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }*/

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function remark()
    {
        return $this->belongsTo(Remark::class, 'remark_id');
    }
}
