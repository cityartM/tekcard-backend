<?php

namespace App\Services;

use Iyzipay\Options;
use Iyzipay\Model\Payment;
use Iyzipay\Request\CreatePaymentRequest;

class IyzipayService
{
    protected $options;

    public function __construct()
    {
        $this->options = new Options();
        $this->options->setApiKey(config('iyzipay.api_key'));
        $this->options->setSecretKey(config('iyzipay.secret_key'));
        $this->options->setBaseUrl(config('iyzipay.base_url'));
    }

    public function createPayment($paymentData)
    {
        $request = new CreatePaymentRequest();
        $request->setLocale('tr');
        $request->setConversationId(uniqid());
        $request->setPrice($paymentData['price']);
        $request->setPaidPrice($paymentData['paid_price']);
        $request->setCurrency('TRY');
        $request->setInstallment(1); 
        $request->setBasketId(uniqid());
        $request->setPaymentChannel('WEB');
        $request->setPaymentGroup('PRODUCT');
        $request->setCallbackUrl(route('payment.callback'));

        // Add buyer information
        $request->setBuyer($paymentData['buyer']);

        // Add payment card information
        $request->setPaymentCard($paymentData['payment_card']);

        // Add basket items
        $request->setBasketItems($paymentData['basket_items']);

        $payment = Payment::create($request, $this->options);

        return $payment;
    }
}
