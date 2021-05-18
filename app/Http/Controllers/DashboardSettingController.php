<?php

namespace App\Http\Controllers;

class DashboardSettingController extends Controller
{
    public function store()
    {
        return view('pages.dashboard.dashboard-store');
    }
    public function account()
    {
        return view('pages.dashboard.dashboard-account');
    }
}
