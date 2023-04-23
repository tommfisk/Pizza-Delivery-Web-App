<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function via(Request $request) {
        session_start();

        $_SESSION['via'] = $request['via'];

        return redirect('checkout');
    }

    public function addToOrder(Request $request) {
        session_start();

        $pizzas = Pizza::all();

        $pizza_size = $request['size'];

        foreach ($pizzas as $pizza) {
            if ($request['id'] == $pizza->id) {
                $_SESSION['order'][] = [$pizza->id, $pizza->name, $pizza_size, $pizza->$pizza_size];
            }
        }


        return redirect('home');
    }

    public function store(Request $request) {
        session_start();

        // Order table
        $order = new Order;

        $order->user_id = $request['user_id'];
        $order->total = $request['total'];
        $order->via = $request['via'];
        $order->deal_id = $request['deal'];

        $order->save();

        // Order_pizza table, new row for each pizza ordered
        foreach($_SESSION['order'] as $pizza) {
            $order_pizza = new OrderPizza;

            $order_pizza->order_id = $this->getNextOrderID();
            $order_pizza->pizza_id = $pizza[0];
            $order_pizza->size = $pizza[2];

            $order_pizza->save();
        }

        session_destroy();

        return redirect('home');
    }

    private function getNextOrderID()
    {
        $statement = DB::table('orders')
            ->select('id')
            ->orderBy('id', 'DESC')
            ->first();

        return $statement->id;
    }
}
