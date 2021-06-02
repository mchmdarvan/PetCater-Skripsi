<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])
            ->where('users_id', auth()->user()->id)
            ->get();

        return view('pages.cart', [
            'carts' => $carts,
        ]);
    }

    public function success()
    {
        return view('pages.success');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();
        return redirect()->route('cart');
    }
}
