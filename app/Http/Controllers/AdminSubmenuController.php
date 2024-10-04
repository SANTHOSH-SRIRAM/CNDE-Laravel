<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Submenu;
use Illuminate\Http\Request;

class AdminSubmenuController extends Controller
{
    // Display a listing of the submenus
    public function index()
    {
        $menus = Menus::with('submenus')->get(); // Fetch all menus with their submenus
        return view('admin.submenus.subMenuListIndex', compact('menus'));
    }

    // Show the form to create a new submenu (Admin Only)
    public function create()
    {
        $menus = Menus::all(); // Fetch all menus to be used in the creation form
        return view('admin.submenus.create', compact('menus'));
    }

    // Store a newly created submenu (Admin Only)
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'subparent_name' => 'array|required',
            'subparent_name.*' => 'string|max:255',
            'submenu' => 'array|required',
            'submenu.*' => 'array|required',
            'submenu.*.*' => 'string|max:255',
        ]);
    
        foreach ($request->subparent_name as $index => $subparentName) {
            if (isset($request->submenu[$index])) {
                foreach ($request->submenu[$index] as $submenuName) {
                    Submenu::create([
                        'name' => $submenuName,
                        'menu_id' => $request->menu_id,
                        'subparent_name' => $subparentName,
                    ]);
                }
            }
        }
    
        return redirect()->route('submenus.index')->with('success', 'Submenus created successfully.');
    }
    
    

    // Show the form to edit an existing submenu (Admin Only)
    public function edit(Submenu $submenu)
    {
        $menus = Menus::all(); // Fetch all menus to be used in the edit form
        return view('admin.submenus.edit', compact('submenu', 'menus'));
    }

    // Update an existing submenu (Admin Only)
    public function update(Request $request, Submenu $submenu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id',
            'subparent_name' => 'nullable|string|max:255',
        ]);

        $submenu->update($request->only('name', 'menu_id', 'subparent_name'));

        return redirect()->route('submenus.index')->with('success', 'Submenu updated successfully.');
    }

    // Delete an existing submenu (Admin Only)
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();
        return redirect()->route('submenus.index')->with('success', 'Submenu deleted successfully.');
    }
}
