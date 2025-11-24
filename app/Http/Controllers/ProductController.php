<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();

        $recentlyViewedIds = json_decode(request()->cookie('recently_viewed_products', '[]'), true);
        $recentlyViewed = Product::whereIn('id', $recentlyViewedIds)->orderByRaw('FIELD(id, ' . implode(',', $recentlyViewedIds ?: [0]) . ')')->take(5)->get();

        return view('products.index', compact('products', 'recentlyViewed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoriesInfo = Category::all();
        $categories = $categoriesInfo->pluck('name', 'id');

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'category_id' => 'required|integer|exists:categories,id',
            'unit_price' => 'required|numeric|min:0',
        ]);
        $validated['is_active'] = $request->has('is_active');

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        $recentlyViewed = json_decode(request()->cookie('recently_viewed_products', '[]'), true);

        $recentlyViewed = array_filter($recentlyViewed, fn ($product_id) => $product_id != $id);
        array_unshift($recentlyViewed, $id);
        $recentlyViewed = array_slice($recentlyViewed, 0, 5);

        return response()->view('products.show', compact('product'))->cookie('recently_viewed_products', json_encode($recentlyViewed), 7 * 24 * 60);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categoriesInfo = Category::all();
        $categories = $categoriesInfo->pluck('name', 'id');

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:60',
            'category_id' => 'required|integer|exists:categories,id',
            'unit_price' => 'required|numeric|min:0',
        ]);
        $validated['is_active'] = $request->has('is_active');

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
