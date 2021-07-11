<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $month = Carbon::now()->format('m');
        $totalTransaction = Transaction::where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $product = Product::count();
        $sell = TransactionDetail::whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellMonth = TransactionDetail::whereMonth('created_at', $month)->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $recents = Transaction::with(['user'])->orderBy('created_at', 'desc')->take(8);
        $pending = Transaction::where('transaction_status', 'PENDING')->count();
        $transaction = Transaction::count();
        $failed = Transaction::where('transaction_status', 'FAILED')->count();
        $success = Transaction::where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->count();
        $transactionMonth = Transaction::whereMonth('created_at', $month)->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');

        return view('pages.admin.dashboard', [
            'totalTransaction' => $totalTransaction,
            'recents' => $recents->get(),
            'product' => $product,
            'pending' => $pending,
            'failed' => $failed,
            'success' => $success,
            'transactionMonth' => $transactionMonth,
            'transaction' => $transaction,
            'sell' => $sell,
            'sellMonth' => $sellMonth,
        ]);
    }
}
