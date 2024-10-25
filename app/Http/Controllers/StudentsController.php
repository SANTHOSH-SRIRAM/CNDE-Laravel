<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //
    public function index()
    {
        // Fetch all research entries from the database
        $students = Students::all();
        $menus = Menus::with('submenus')->get();
        // Pass the research data to the view
        return view('students.index', compact('students', 'menus'));
    }

    // Show a specific research entry by ID (as before)
    public function show($id)
    {
        $student = Students::with('submenu')->findOrFail($id);
        $menus = Menus::with('submenus')->get();
        return view('students.show', compact('student', 'menus'));
    }
}
