<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    //

    

    public function index()
    {

        
        $menus = Menus::with('submenus')->get();

        if ($menus->isEmpty()) {
            Log::info('No menus found.');
        }
        
        return view('menuItems', compact('menus'));
    }
}
