<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with(['user'])->orderBy('created_at', 'desc');
        return view('pages.admin.transaction.index', [
            'transactions' => $transactions->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with(['user'])->findOrFail($id);
        $details = TransactionDetail::with(['transaction.user', 'product.galleries'])->where('transactions_id', $id)->orderBy('created_at', 'desc');
        return view('pages.admin.transaction.detail', [
            'transaction' => $transaction,
            'details' => $details->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', [
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $transaction = Transaction::findOrFail($id);

        $transaction->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->delete();
        return redirect()->route('transaction.index');
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

        return redirect()->route('transaction.index');
    }
}
