<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use DB;
 
class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        $stripe = DB::table('stripe')->where('id', 2)->first(); 

        if ($request->input('stripeToken')) {
  
            $gateway = Omnipay::create('Stripe');


            $gateway->setApiKey($stripe->values);
          
            $token = $request->input('stripeToken');
          
            $response = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'token' => $token,
            ])->send();
          
            if ($response->isSuccessful()) {
                // payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();

                $unique_id = $request->input('unique_id');
                 
                // $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();
          
                // if(!$isPaymentExist)
                // {
                    $payment = Payment::where('unique_id', $unique_id)->first();
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = $request->input('email');
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status = $arr_payment_data['status'];
                    
                    $payment->save();
                // }

                return view('complete');
 
                // return "Payment is successful. Your payment id is: ". $arr_payment_data['id'];
            } else {
                // payment failed: display message to customer
                return $response->getMessage();
            }
        }
    }
}