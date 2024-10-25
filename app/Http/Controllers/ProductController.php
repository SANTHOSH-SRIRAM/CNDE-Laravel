<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        // Fetch all research entries from the database
        $products = Products::all();

        // Pass the research data to the view
        return view('product.index', compact('products'));
    }

    // Show a specific research entry by ID (as before)
    public function show($id)
    {
        $product = Products::with('submenu')->findOrFail($id);
        $menus = Menus::with('submenus')->get();
        return view('product.show', compact('product', 'menus'));
    }
}
