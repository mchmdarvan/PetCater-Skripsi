<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recents = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);})
            ->orderBy('created_at', 'desc');
        $transactions = Transaction::where('users_id', Auth::user()->id)->where('transaction_status', '!=', 'FAILED');
        $total = Transaction::where('users_id', Auth::user()->id)->where('transaction_status', '!=', 'FAILED');
        return view('pages.dashboard.dashboard', [
            'transactions' => $transactions->count(),
            'total' => $total->sum('total_price'),
            'recents' => $recents->limit(4)->get(),
        ]);
    }
}
