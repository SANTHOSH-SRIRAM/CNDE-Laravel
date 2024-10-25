<?php

namespace App\Http\Controllers;

use App\Models\FundedResearch;
use App\Models\Menus;
use Illuminate\Http\Request;

class FundedResearchController extends Controller
{
    //
    public function index()
    {
        // Fetch all research entries from the database
        $fundedresearches = FundedResearch::all();

        // Pass the research data to the view
        return view('fundedresearch.index', compact('fundedresearches'));
    }

    // Show a specific research entry by ID (as before)
    public function show($id)
    {
        $researches = FundedResearch::with('submenu')->findOrFail($id);
        $menus = Menus::with('submenus')->get();
        return view('fundedresearch.show', compact('researches', 'menus'));
    }
}
