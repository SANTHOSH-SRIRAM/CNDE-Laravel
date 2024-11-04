<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Discover;
use App\Models\Landing;
use App\Models\Menus;
use App\Models\OurOutput;
use App\Models\Startups;
use Illuminate\Http\Request;

class TabsController extends Controller
{
    // Fetch menus with submenus and return to the view
    protected function getMenus()
    {
        return Menus::with('submenus')->get(); // Fetch menus with submenus
    }

    public function index()
    {
        $menus = $this->getMenus(); // Use the helper method to fetch menus
        $clients = Clients::all();
        $landing = Landing::first();
        $ouroutputs = OurOutput::all() ?? [];
        $startups = Startups::all();
        
        foreach ($clients as $client) {
            if (is_string($client->logo_paths)) {
                $client->logo_paths = json_decode($client->logo_paths, true);
            }
        }
        return view('welcome', [
            'activeTab' => 'news', // Default tab
            'discovers' => Discover::all(), // Fetch all Discover entries if needed
            'menus' => $menus, // Pass menus to the view
            'clients' => $clients,
            'landing' => $landing, // Include landing data
            'ouroutputs' => $ouroutputs, // Include our output data
            'startups' => $startups,
        ]);
    }

    public function showTab($tab)
    {

        $menus = $this->getMenus(); // Use the helper method to fetch menus
        $discovers = Discover::all(); // Fetch all Discover entries

        return view('welcome', [
            'discovers' => $discovers, // Pass the collection of Discover models
            'activeTab' => $tab, // Set active tab based on the route parameter
            'menus' => $menus // Pass menus to the view
        ]);
    }
}
