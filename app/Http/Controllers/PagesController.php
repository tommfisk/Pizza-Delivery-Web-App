<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\Pizza;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        session_start();

        $pizzas = Pizza::all();

        return view('home', compact('pizzas'));
    }

    public function orderHistory() {

        $user = Auth::user();
        $deals = Deal::all();
        $orders = Order::all();

        return view('order_history', compact('user', 'deals', 'orders'));
    }

    public function details(Request $request) {
        session_start();

        $_SESSION['order_selected'] = $request['order_selected'];

        return redirect('order_history_details');
    }

    public function orderHistoryDetails() {
        session_start();

        $user = Auth::user();
        $deals = Deal::all();
        $pizzas = Pizza::all();
        $orders = Order::all();
        $order_pizzas = OrderPizza::all();

        return view('order_history_details', compact('user', 'deals', 'pizzas', 'orders', 'order_pizzas'));
    }

    public function deals() {
        session_start();

        $pizzas = Pizza::all();
        $deals = Deal::all();

        return view('deal', compact('pizzas', 'deals'));
    }

    public function checkout() {
        session_start();

        $user = Auth::user();
        $deals = Deal::all();

        return view('checkout', compact('user', 'deals'));
    }
}
