<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Professors;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    //
    public function index()
    {
        // Fetch all research entries from the database
        $professors = Professors::all();
        $menus = Menus::with('submenus')->get();

        // Pass the research data to the view
        return view('professor.index', compact('professors', 'menus'));
    }

    // Show a specific research entry by ID (as before)
    public function show($id)
    {
        $professor = Professors::with('submenu')->findOrFail($id);
        $menus = Menus::with('submenus')->get();
        return view('professor.show', compact('professor', 'menus'));
    }
}
