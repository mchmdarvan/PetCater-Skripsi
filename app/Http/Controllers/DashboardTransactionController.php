<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);})
            ->orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.dashboard-transaction', [
            'transactions' => $transactions,
        ]);
    }
    public function details($id)
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])->where('code', $id)->firstOrFail();
        return view('pages.dashboard.dashboard-transaction-details', [
            'transaction' => $transaction,
        ]);
    }
}
