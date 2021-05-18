<?php

namespace App\Http\Controllers;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.dashboard-transaction');
    }
    public function details()
    {
        return view('pages.dashboard.dashboard-transaction-details');
    }
}
