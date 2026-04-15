<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where("stock", ">", 0)->get();
        
        return view("transaction/sales", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi stok terlebih dahulu sebelum memproses transaksi
        foreach($request->cart as $data) {
            $product = Product::where("id", "=", $data['id'])->first();
            if (!$product) {
                return response()->json([
                    "status" => "error",
                    "message" => "Produk tidak ditemukan."
                ], 400);
            }
            if ($product->stock < $data['total']) {
                return response()->json([
                    "status" => "error",
                    "message" => "Stok produk \"{$product->name}\" tidak mencukupi. Stok tersedia: {$product->stock}, jumlah diminta: {$data['total']}."
                ], 400);
            }
        }

        // Semua stok mencukupi, proses transaksi
        foreach($request->cart as $data) {
            $transaction = new Transaction();
            $transaction->product_id = $data['id'];
            $transaction->user_id = Auth::user()->id;
            $transaction->count = $data['total'];
            
            $product = Product::where("id", "=", $data['id'])->first();
            $product->stock = $product->stock - $data['total'];
            
            $transaction->buy_price = $product->buy_price;
            $transaction->sell_price = $product->sell_price;

            $product->save();
            $transaction->save();
        }
        return response()->json([
            "status" => "success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function purchase()
    {
        $products = Product::all();
        
        return view("transaction/purchase", ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function purchase_store(Request $request)
    {
        foreach($request->cart as $data) {
            $product = Product::where("id", "=", $data['id'])->first();
            $product->stock = $product->stock + $data['total'];
            $product->save();
        }
        return json_encode([
            "status" => "success"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
