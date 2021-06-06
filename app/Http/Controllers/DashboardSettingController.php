<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    public function account()
    {
        $user = Auth::user();
        return view('pages.dashboard.dashboard-account', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/users', 'public');
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}
