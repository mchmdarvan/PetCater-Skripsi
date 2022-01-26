<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Mail\CheckoutNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        // TODO: Save users data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Proses checkout
        $code = 'STORE-' . mt_rand(0000, 9999);
        $carts = Cart::with(['product', 'user'])
            ->where('users_id', Auth::user()->id)
            ->get();

        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'payment_methods' => $request->payment_methods,
            'transaction_status' => 'PENDING',
            'code' => $code,
        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000, 9999);
            $product = Product::where('id', $cart->product->id);
            $product->decrement('qty', $cart->qty);

            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'qty' => $cart->qty,
                'price' => $cart->product->price * $cart->qty,
                'code' => $trx,
            ]);
        }

        // Delete cart data
        Cart::with(['product', 'user'])
            ->where('users_id', Auth::user()->id)
            ->delete();
        
        Mail::to($user->email)->send(new CheckoutNotification([
            'email' => $user->email,
        ]));

        return redirect()->route('success');
    }

    // public function cancel()
    // {
    //     $timeShop = Transaction::where('users_id', Auth::user()->id);
    //     $dates = Carbon::now()->addHour();

    //     if ($dates $timeShop->created_at < ) {
    //         $timeShop->transaction_status = 'FAILED';
    //     }
    // }
}
