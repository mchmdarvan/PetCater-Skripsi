<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = User::where('roles', 'USER')->count();
        $product = Product::count();
        $transaction = Transaction::count();

        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'product' => $product,
            'transaction' => $transaction,
        ]);
    }
}
