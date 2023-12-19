<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class DashboardController extends Controller
{
    public function dashboard(){

        $today_sales = Sale::whereDate('created_at', now()->toDateString())->sum('sale_price');
        $yesterday_sales = Sale::whereDate('created_at', now()->subDay()->toDateString())->sum('sale_price');
        $thisMonth_sales = Sale::whereMonth('created_at', now()->month)->sum('sale_price');
        $lastMonth_sales = Sale::whereMonth('created_at', now()->subMonth()->month)->sum('sale_price');


        return view('dashboard', compact('today_sales', 'yesterday_sales','thisMonth_sales','lastMonth_sales'));
    }
}
