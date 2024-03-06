<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Page\Models\Page;
use Modules\Card\Models\Card;
use Modules\Card\Models\CardApps;

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
        
        $cardApps = CardApps::where('card_id',$card->id)->get();

        
        return view('card',compact('card','cardApps'));
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
