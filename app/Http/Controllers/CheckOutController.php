<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentMail;
use Cart;
use App\Models\Order;

class CheckOutController extends Controller
{
    /**
     * returns the payment screen for checkout
     */
    public function index()
    {
        return view('pages.proceed-payment');
    }
    /**
     * the user pays for purchased products
     */
    public function store(Request $request)
    {
        //get data from inputs
        $name = $request->input('name');
        $email = $request->input('email');
        $amount = $request->input('amount');
        $tax = $amount * 15/100;
        $amount_with_vat = $amount + $tax;
        //check user is guest 
        if(Auth::guest()){
           $user_id = 0;
           $total_amount = $amount_with_vat;
         }else{
            $user_id = Auth::user()->id;
            $total_amount = $amount_with_vat - ($amount_with_vat * 3/100);
        }
        
          $amount_due = ceil($total_amount);
          try{
            $stripe = new \Stripe\StripeClient("stripe key");  
            $charge = $stripe->charges->create([
                'amount' => ($amount_due * 100),
                'currency' => 'ZAR',
                'source' => $request->stripeToken, // obtained with Stripe.js
                'description' => 'Customer Billing Information'
              ]);
              $order = new Order;
              $order->name = $request->input('name');
              $order->email = $request->input('email');
              $order->user_id = $user_id;
              $order->amount = $total_amount;
              $order->save();
              // remove the cart when finish paying
              Cart::destroy();
              $data = array();
              $data['name'] = $request->input('name');
              $data['email'] = $request->input('email');
              $data['amount'] = $total_amount;

              Mail::to($request->input('email'))->send(new PaymentMail($data));
              return redirect('/thank_you')->with('success_message','Thank You For Choosing Us');
          }catch(Exception $ex){
             return redirect()->back()->with('error_message',$ex->getMessage());
          }
       
    }
}
