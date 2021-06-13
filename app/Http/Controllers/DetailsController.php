<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $product = Product::with(['galleries'])->where('slug', $id)->firstOrFail();
        $recomends = Product::with(['galleries'])->inRandomOrder()->limit(4)->get();
        return view('pages.details', [
            'product' => $product,
            'recomends' => $recomends,
        ]);
    }

    public function add(CartRequest $request, $id)
    {
        $cart = Cart::where('products_id', $id)->where('users_id', Auth::user()->id)->first();

        if ($cart) {
            $cart->increment('qty', $request->qty);
        } else {
            Cart::create([
                'products_id' => $id,
                'users_id' => Auth::user()->id,
                'qty' => $request->qty,
            ]);
        }

        return redirect()->route('cart');
    }
}
