<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all clients and pass them to the view
        $clients = Clients::all();
        return view('admin.ourClients.ClientsIndex', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new client
        return view('admin.ourClients.CreateClients');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input and file upload
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        // Handle the file upload if there's a logo
        if ($request->hasFile('logo')) {
            $logoName = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $logoName);
            $logoPath = 'logos/' . $logoName;
        } else {
            $logoPath = null;
        }

        // Create the client with the validated data
        Clients::create([
            'name' => $request->name,
            'logo_path' => $logoPath,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $client)
    {
        // Display a single client
        return view('admin.ourClients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clients $client)
    {
        // Return the view to edit a client
        return view('admin.ourClients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clients $client)
    {
        // Validate the form input and file upload
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        // Handle the file upload if there's a new logo
        if ($request->hasFile('logo')) {
            $logoName = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $logoName);
            $logoPath = 'logos/' . $logoName;
        } else {
            // Keep the old logo if no new logo is uploaded
            $logoPath = $client->logo_path;
        }

        // Update the client with the new data
        $client->update([
            'name' => $request->name,
            'logo_path' => $logoPath,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $client)
    {
        // Delete the client from the database
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
