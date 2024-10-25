<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Submenu;
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
    public function showSubmenu(Submenu $submenu)
    {
        if ($submenu->name === 'Dhvani Research') {
            $submenu->link = route('startups'); // Example linking
        }
        else
        return view('submenus.show', compact('submenu'));
    }
}
