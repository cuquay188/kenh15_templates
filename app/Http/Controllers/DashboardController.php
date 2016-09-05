<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class DashboardController extends Controller
{
    public function getIndex()
    {
        if (!Auth::check())
            return redirect()->route('admin.auth.login')->with(['fail' => 'Required login.']);
        return view('admin.index');
    }

    public function getDashboard()
    {
        return view('admin.dashboard.index');
    }
}
