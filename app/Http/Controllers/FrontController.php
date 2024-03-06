<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Page\Models\Page;
use Modules\Card\Models\Card;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendCard;

class FrontController extends Controller
{
    
    public function AboutUs()
    {
        
        $page = Page::where('name', 'about_us')->first();
        
        return view('About_us', compact('page'));
    }


    public function show($ref)
    {
        //$card = Card::find($id);
        $card = Card::where('reference',$ref)->first();
       // dd($card);
        return view('card',compact('card'));
    }

    public function sendCardByEmail(Request $request, Card $card)
    {
        // Retrieve email from the request
        $email = $request->input('email');
    //dd($card);
        // Send the email
        Mail::to($email)->send(new SendCard($card));
    
      
        return response()->json(['message' => 'Email sent successfully']);
    }

}
