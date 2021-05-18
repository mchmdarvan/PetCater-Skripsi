<?php

namespace App\Http\Controllers;

class DashboardProductController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.dashboard-product');
    }

    public function details()
    {
        return view('pages.dashboard.dashboard-product-details');
    }

    public function create()
    {
        return view('pages.dashboard.dashboard-product-create');
    }
}
