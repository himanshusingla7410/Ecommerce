<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Exception;
use Razorpay\Api\Api;



class RazorpayController extends Controller
{

    protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(config('payment.razorpay.api_key'), config('payment.razorpay.secret_key'));
    }

    public function createOrder(OrderService $orderService)
    {

        request()->validate([
            'amount' => ['numeric', 'required'],
            'currency' => ['string', 'max:3'],
            'receipt' => ['string', 'required'],
            'notes.couponCode' => ['nullable', 'string', 'max:15'],
            'notes.address' => ['string', 'min:2']
        ]);

        try {

            $order = $this->razorpay->order->create([
                'amount' => request('amount') * 100,
                'currency' => strtoupper(request('currency')),
                'receipt' => request('receipt'),
                'notes' => [
                    'couponCode' => request('notes.couponCode') ?? "",
                    'address'=> request('notes.address')
                ]
            ]);

            $orderNumber= $orderService->createOrder(request('amount'), request('notes.couponCode'), request('notes.address'));

            return response()->json([
                'status' => 'success',
                'id' => $order->id,
                'orderNumber' => $orderNumber,
                'amount' => request('amount'),
                'key' => config('payment.razorpay.api_key'),
            ]);
        } catch (Exception $e) {
            return 'Error while creating order ' . $e;
        }
    }


    public function paymentVerification(OrderService $orderService) {

        $this->razorpay->utility->verifyPaymentSignature([
            'razorpay_order_id' => request('razorpay_order_id'), 
            'razorpay_payment_id' => request('razorpay_payment_id'), 
            'razorpay_signature' => request('razorpay_signature')
        ]);

        $orderService->update(request()->query('orderNumber'));

        $orderDetails = $orderService->getDetails(request()->query('orderNumber'));

        return view('shipping.create', compact('orderDetails'));


        
    }


   
}
