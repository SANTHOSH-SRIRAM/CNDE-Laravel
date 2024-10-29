<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menus;
use App\Models\Research;
use App\Models\Submenu;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    // Display all research entries
    public function index()
    {
        // Fetch all research entries from the database
        $researches = Research::with(['submenu'])->get();
        $menus = Menus::with('submenus')->get();

        // Pass the research data to the view
        $menus = Menus::with('submenus')->get();

        return view('research.index', compact('researches', 'menus'));
    }

    // Show a specific research entry by ID (as before)
    public function show($submenu_name)
    {
        $submenu = Submenu::where('name', $submenu_name)->firstOrFail();
        $researches = Research::where('submenu_id', $submenu->id)->get();
        $menus = Menus::with('submenus')->get();
        
        return view('research.show', compact('researches', 'submenu', 'menus'));
    }
}
