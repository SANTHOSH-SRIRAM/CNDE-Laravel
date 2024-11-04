<?php

namespace App\Http\Controllers;

use App\Models\Startups;
use App\Models\Menu; // Include the Menu model
use App\Models\Menus;
use Illuminate\Http\Request;

class StartupsController extends Controller
{
    // Fetch all startups and display the list
    public function index()
    {
        // Fetch all startups from the database
        $startups = Startups::all();
        
        // Return the 'startups.index' view and pass the startups data
        return view('startups.startups', compact('startups'));
    }
    public function landingStartups()
    {
        // Fetch all startups from the database
        $startups = Startups::all();
        
        $menus = Menus::with('submenus')->get();
        // Return the 'startups.index' view and pass the startups data
        return view('landing.landingSec5', compact('startups', 'menus'));
    }
    // Show a specific startup based on its ID
    public function show($id)
    {
        // Fetch the startup by ID along with its submenu relationship
        $startup = Startups::with('submenu')->findOrFail($id);

        // Fetch the menus with their submenus
        $menus = Menus::with('submenus')->get();

        // Return the 'startups.show' view and pass the startup and menus data
        return view('startups.show', compact('startup', 'menus'));
    }
}
