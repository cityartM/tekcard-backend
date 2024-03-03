<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Page\Models\Page;

class FrontController extends Controller
{
    
    public function AboutUs()
    {
        
        $page = Page::where('name', 'about_us')->first();
        
        return view('About_us', compact('page'));
    }



}
