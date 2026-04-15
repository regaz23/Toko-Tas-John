<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $current_user =  Auth::user();

        return view("product/index", ["products" => $products, "current_user" => $current_user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("product/form", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:category,id',
            'buy_price' => 'integer|required',
            'sell_price' => 'integer|required',
        ]);
    
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->stock = 0;
        $product->user_id = Auth::user()->id;
        $product->save();
    
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found.');
        }
        $categories = Category::all();
        return view("product/form", ["categories" => $categories, "product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found.');
        }

        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'category_id' => 'integer|exists:category,id',
            'buy_price' => 'integer',
            'sell_price' => 'integer',
        ]);

        foreach ($validatedData as $key => $value) {
            $product->$key = $value;
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
