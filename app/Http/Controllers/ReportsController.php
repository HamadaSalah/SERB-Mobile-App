<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function orders_report() {
        $orders = Order::latest()->get();
        return view('Admin.Reports.orders', compact('orders'));
    }
}
