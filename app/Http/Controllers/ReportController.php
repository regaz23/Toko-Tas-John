<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class ReportController extends Controller
{
    public function index() {
        $transactions = Transaction::all();
        $total_sell = $transactions->sum("count");
        $total_sell_price = 0;
        $total_buy_price = 0;
        foreach($transactions as $tran) {
            $total_buy_price += $tran->buy_price * $tran->count;
            $total_sell_price += $tran->sell_price * $tran->count;
        }
        $totalBenefit = $total_sell_price - $total_buy_price;
        return view("report/index", ["transactions" => $transactions, "total_sell" => $total_sell, "total_buy_price" => $total_buy_price, "total_sell_price" => $total_sell_price, "totalBenefit" => $totalBenefit]);
    }
}
