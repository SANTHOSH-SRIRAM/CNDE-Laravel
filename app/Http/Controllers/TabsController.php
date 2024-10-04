<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;

class TabsController extends Controller

{
    public function index()
    {
        $menus = Menus::with('submenus')->get(); // Fetch menus with submenus
   
        return view('welcome', ['activeTab' => 'news'], compact('menus')); // Default tab
    }

    public function showTab($tab)
    {
        if (!in_array($tab, ['news', 'events', 'announcements'])) {
            abort(404);
        }
        
        return view('welcome', ['activeTab' => $tab]);
    }
}
