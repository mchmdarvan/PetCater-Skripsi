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

    public function report()
    {
        $jan = Transaction::whereMonth('created_at', '01')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $feb = Transaction::whereMonth('created_at', '02')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $mar = Transaction::whereMonth('created_at', '03')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $apr = Transaction::whereMonth('created_at', '04')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $may = Transaction::whereMonth('created_at', '05')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $jun = Transaction::whereMonth('created_at', '06')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $jul = Transaction::whereMonth('created_at', '07')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $aug = Transaction::whereMonth('created_at', '08')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $sep = Transaction::whereMonth('created_at', '09')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $okc = Transaction::whereMonth('created_at', '10')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $nov = Transaction::whereMonth('created_at', '11')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');
        $dec = Transaction::whereMonth('created_at', '12')->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING')->sum('total_price');

        $sellJan = TransactionDetail::whereMonth('created_at', '01')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellFeb = TransactionDetail::whereMonth('created_at', '02')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellMar = TransactionDetail::whereMonth('created_at', '03')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellApr = TransactionDetail::whereMonth('created_at', '04')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellMai = TransactionDetail::whereMonth('created_at', '05')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellJun = TransactionDetail::whereMonth('created_at', '06')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellJul = TransactionDetail::whereMonth('created_at', '07')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellAug = TransactionDetail::whereMonth('created_at', '08')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellSep = TransactionDetail::whereMonth('created_at', '09')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellOct = TransactionDetail::whereMonth('created_at', '10')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellNov = TransactionDetail::whereMonth('created_at', '11')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');
        $sellDec = TransactionDetail::whereMonth('created_at', '12')->whereHas('transaction', function ($q) {
            $q->where('transaction_status', 'SUCCESS')->orWhere('transaction_status', 'SHIPPING');
        })->sum('qty');

        return view('pages.admin.report', [
            'jan' => $jan,
            'feb' => $feb,
            'mar' => $mar,
            'apr' => $apr,
            'may' => $may,
            'jun' => $jun,
            'jul' => $jul,
            'aug' => $aug,
            'sep' => $sep,
            'okc' => $okc,
            'nov' => $nov,
            'dec' => $dec,
            'sellJan' => $sellJan,
            'sellFeb' => $sellFeb,
            'sellMar' => $sellMar,
            'sellApr' => $sellApr,
            'sellMai' => $sellMai,
            'sellJun' => $sellJun,
            'sellJul' => $sellJul,
            'sellAug' => $sellAug,
            'sellSep' => $sellSep,
            'sellOct' => $sellOct,
            'sellNov' => $sellNov,
            'sellDec' => $sellDec,
        ]);
    }
}
