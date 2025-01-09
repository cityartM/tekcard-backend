<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iyzipay\Options;
use Iyzipay\Model\Payment;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Address;
use Modules\Plan\Models\Plan;

class PaymentController extends Controller
{
    /**
     * Display payment form for the selected plan.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function checkout(Request $request)
    {
        
        $planId = $request->query('plan_id'); 
        $plan = Plan::findOrFail($planId);
        

        return view('payment', compact('plan'));
    }

    /**
     * Process the payment.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(Request $request)
{
    $request->validate([
        'plan_id' => 'required|exists:plans,id',
        'card_holder_name' => 'required|string',
        'card_number' => 'required|digits:16',
        'expire_month' => 'required|digits:2',
        'expire_year' => 'required|digits:2',
        'cvc' => 'required|digits:3',
    ]);

    $plan = Plan::findOrFail($request->plan_id);
    $user = auth()->user();
    
    // Iyzico configuration
    $options = new Options();
    $options->setApiKey(config('iyzipay.api_key'));
    $options->setSecretKey(config('iyzipay.secret_key'));
    $options->setBaseUrl(config('iyzipay.base_url'));
    
    // Create payment request
    $paymentRequest = new CreatePaymentRequest();
    $paymentRequest->setLocale("tr");
    $paymentRequest->setConversationId(uniqid());
    $paymentRequest->setPrice($plan->price);
    $paymentRequest->setPaidPrice($plan->price);
    $paymentRequest->setCurrency("TRY");
    $paymentRequest->setInstallment(1);
    
    // Buyer information
    $buyer = new Buyer();
    $buyer->setId((string)$user->id);
    $buyer->setName($user->name);
    $buyer->setEmail($user->email);
    $buyer->setIdentityNumber("11111111111"); // You may want to dynamically handle this
    $buyer->setGsmNumber($user->phone);
    $buyer->setRegistrationAddress("No Address Provided");
    $paymentRequest->setBuyer($buyer);

    // Billing Address
    $billingAddress = new Address();
    $billingAddress->setContactName($user->name);
    $billingAddress->setCity($user->city_id);
    $billingAddress->setCountry("Turkey");
    $billingAddress->setAddress($user->address);
    $paymentRequest->setBillingAddress($billingAddress);
    
    // Basket Items
    $basketItem = new BasketItem();
    $basketItem->setId((string)$plan->id);
    $basketItem->setName($plan->display_name);
    $basketItem->setCategory1("Subscription");
    $basketItem->setPrice($plan->price);
    $paymentRequest->setBasketItems([$basketItem]);
    
    // Create and set the PaymentCard object
    $paymentCard = new \Iyzipay\Model\PaymentCard();
    $paymentCard->setCardHolderName($request->card_holder_name);
    $paymentCard->setCardNumber($request->card_number);
    $paymentCard->setExpireMonth($request->expire_month);
    $paymentCard->setExpireYear($request->expire_year);
    $paymentCard->setCvc($request->cvc);

    // Here we set the PaymentCard object into the PaymentRequest
    $paymentRequest->setPaymentCard($paymentCard);
    
    // Process payment
    $payment = Payment::create($paymentRequest, $options);
    
   
    if ($payment->getStatus() == "success") {
        // Store user plan details
        UserPlan::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'price' => $plan->price,
            'purchase_date' => now(),
            'expired_date' => now()->addDays($plan->duration),
        ]);

        return redirect()->route('plans.index')->withSuccess("Payment successful! Your plan is activated.");
    } else {
        return back()->withErrors("Payment failed: " . $payment->getErrorMessage());
    }
}
}
