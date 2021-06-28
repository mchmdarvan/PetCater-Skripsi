<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(6)->get();
        $products = Product::with(['galleries'])->where('qty', '!=', 0)->take(8)->orderBy('created_at', 'ASC')->get();
        return view('pages.home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
