<?php

namespace App\Http\Controllers;

use App\Models\Discover;
use Illuminate\Http\Request;

class DiscoverTabController extends Controller
{
    //
    public function showDiscoverTabs(Request $request, $tab = 'news')
    {
        // Fetch all entries from the Discover model
        $discovers = Discover::all(); // This returns a Collection of models

        // Return the view with the fetched data and the active tab
        return view('discover-tabs', [
            'discovers' => $discovers, // Pass the collection of Discover models
            'activeTab' => $tab, // Set active tab based on the route parameter
        ]);
    }
}
