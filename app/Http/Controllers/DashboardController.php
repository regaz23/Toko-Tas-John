<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_count = Category::count();
        $product_count = Product::count();
        $report_count = Transaction::count();
        return view("dashboard", ["category_count" => $category_count, "product_count" => $product_count, "report_count" => $report_count]);
    }
}
