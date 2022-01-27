<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ReportsController extends Controller
{
    public function orders_report(Request $request) {
        if ($request->input('from') && $request->input('to')) {
            $orders = Order::whereBetween('created_at', [$request->input('from'), $request->input('to')])->get();
        }
        else {
            $orders = Order::latest()->get();
        }
    
        return view('Admin.Reports.orders', compact('orders'));
    }
}
