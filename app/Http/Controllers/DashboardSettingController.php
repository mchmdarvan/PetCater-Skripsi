<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class DashboardSettingController extends Controller
{
    public function account()
    {
        $user = auth()->user()->id;
        return view('pages.dashboard.dashboard-account', [
            'user' => $user,
        ]);
    }

    public function save(UserRequest $request)
    {
        $users = auth()->user()->id;
        $data = $request->all();

        $users->save($data);
        return redirect()->route('dashboard-setting-account');
    }
}
