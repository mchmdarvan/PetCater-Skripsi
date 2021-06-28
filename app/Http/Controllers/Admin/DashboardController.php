<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransaction = Transaction::where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $product = Product::count();
        $recents = Transaction::with(['user'])->orderBy('created_at', 'desc')->take(8);
        $transaction = Transaction::where('transaction_status', 'PENDING')
            ->orWhere('transaction_status', 'SHIPPING')
            ->orWhere('transaction_status', 'SUCCESS')->count();

        return view('pages.admin.dashboard', [
            'totalTransaction' => $totalTransaction,
            'recents' => $recents->get(),
            'product' => $product,
            'transaction' => $transaction,
        ]);
    }
}
