<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $layout = Auth::check() && Auth::user()->role == 'admin'
            ? 'layouts.guest-layout'
            : 'layouts.app-layout';

        return view('dashboard', ['layout' => $layout]);
    }
}
