<?php

namespace App\Http\Controllers;

class CartsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.cart');
    }

    public function success()
    {
        return view('pages.success');
    }
}
