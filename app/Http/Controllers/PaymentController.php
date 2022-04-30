<?php

namespace App\Http\Controllers;
// Requests
use Illuminate\Http\Request;
// Models
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\SoldProduct;
// Facades
use Illuminate\Support\Facades\Auth;
use Cartalyst\Stripe\Stripe;

class PaymentController extends Controller
{
    public function showPayment(){
        $authId = Auth::User()->id;
        $userCartProducts = Order::where('user_id' , $authId)->get();
        
        $totalPrice = 0;
        foreach ($userCartProducts as $singleProduct){
            $totalPrice += $singleProduct->price;
        }

        return view('userPayment')->with("totalPrice", $totalPrice);
    }

    public function buyProducts(Request $request){
        $stripe = new Stripe(env('STRIPE_KEY'), '2017-06-05');
        $stripe = Stripe::make(env('STRIPE_KEY'), '2017-06-05');
// customer
        $customer = $stripe->customers()->create(['email' => $request->email]);
// payment
        $paymentMethods = $stripe->paymentMethods()->all([
            'type' => 'card',
            'customer' => $customer['id'],
        ]);        
        $paymentMethod = $stripe->paymentMethods()->create([
            'type' => 'card',
            'card' => [
                'number' => $request->cartNumber,
                'exp_month' => $request->expireMonth,
                'exp_year' => $request->expireYear,
                'cvc' => $request->cvc
            ],
        ]);
// token
        $token = $stripe->tokens()->create([
            'card' => [
                'number' => $request->cartNumber, // 4242424242424242
                'exp_month' => $request->expireMonth, // 12
                'exp_year' => $request->expireYear, // 2022
                'cvc' => $request->cvc // 314
            ],
        ]);
// card
        $card = $stripe->cards()->create($customer['id'], $token['id']);
// charge
        $charge = $stripe->charges()->create([
            'customer' => $customer['id'],
            'currency' => 'USD',
            'amount'   => $request->totalPrice,
        ]);
        $charge = $stripe->charges()->find($charge['id']);

// after payment put bought orders to database table Orders
        $orders = Order::where('user_id', Auth::User()->id)->get();
        
        foreach($orders as $order){
            SoldProduct::create([
                'userEmail' => $request->email,
                'productId' => $order->id,
                'productPrice' => $order->price,
                'userCountry' => $request->country,
                'userHouse' => $request->house,
                'userAppartement' => $request->appartement,
                'userZip' => $request->zip,
            ]);
        }
// after payment delete from database table Orders
        Order::where('user_id', Auth::User()->id)->delete();

        return redirect('/user-dashboard')->with('payment_success', 'Your payment successfully done');
    }
}