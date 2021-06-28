<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
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

    public function setFailed($id)
    {
        $transaction = Transaction::findOrFail($id);
        $details = TransactionDetail::with(['product', 'transaction'])->where('transactions_id', $id)->get();

        foreach ($details as $detail) {
            $product = Product::where('id', $detail->product->id);
            $product->increment('qty', $detail->qty);
        }

        $transaction->transaction_status = "FAILED";
        $transaction->save();

        return redirect()->back();
    }
}
