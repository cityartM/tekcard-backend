<?php

namespace Modules\ContactUs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'contact_us';

    protected $fillable = ['full_name', 'company', 'email','subject', 'message']; 
    
    protected static function newFactory()
    {
        return \Modules\ContactUs\Database\factories\ContactUsFactory::new();
    }
}
