<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menus;
use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    // Display all research entries
    public function index()
    {
        // Fetch all research entries from the database
        $researches = Research::all();

        // Pass the research data to the view
        return view('research.index', compact('researches'));
    }

    // Show a specific research entry by ID (as before)
    public function show($id)
    {
        $research = Research::with('submenu')->findOrFail($id);
        $menus = Menus::with('submenus')->get();
        return view('research.show', compact('research', 'menus'));
    }
}
