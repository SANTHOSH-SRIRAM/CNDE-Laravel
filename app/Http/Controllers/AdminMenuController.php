<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menus = Menus::with('submenus')->get();
        
        return view('admin.menus.menuListIndex', compact('menus'));
    }

    // Show the form to create a new menu (Admin Only)
    public function create()
    {
        $menus = Menus::all();

        return view('admin.menus.create', compact('menus'));
    }

    // Store a newly created menu (Admin Only)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Menus::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    // Show the form to edit an existing menu (Admin Only)
    public function edit(Menus $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    // Update an existing menu (Admin Only)
    public function update(Request $request, Menus $menu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    // Delete an existing menu (Admin Only)
    public function destroy(Menus $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }

    // Display all menus to the public
    public function showAll()
    {
        $menus = Menus::with('submenus')->get();
        return view('menuItems', compact('menus'));
    }

    // Display a specific menu and its submenus to the public
    public function show(Menus $menu)
    {
        $menu->load('submenus');
        return view('menuItems', compact('menu'));
    }
}
