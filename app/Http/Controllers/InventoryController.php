<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::with("product")->get();
        return view("inventories.index", compact("inventories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productsInfo = Product::all();
        $products = $productsInfo->pluck("name", "id");

        return view("inventories.create", compact("products"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
             "product_id" => "required|integer|exists:products,id",
             "stock_quantity" => "required|integer|min:0",
         ]);

        Inventory::create($validated);
        return redirect()->route("inventories.index")->with("success", "Inventory record created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        return view("inventories.show", compact("inventory"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory = Inventory::findOrFail($id)::with("product")->first();

        return view("inventories.edit", compact("inventory"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
             "stock_quantity" => "required|integer|min:0",
         ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($validated);

        return redirect()->route("inventories.index")->with("success", "Inventory record updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route("inventories.index")->with("success", "Inventory record deleted successfully.");
    }
}
