<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder() {

        return view('order');
    }

    public function postOrder(Request $request) {

    }

    public function addToOrder(Request $request) {
        session_start();

        $_SESSION['pizzas'][] = Pizza::query()
            ->where('id', $request['pizza_id'])
            ->get();

        return redirect('home');
    }
}
