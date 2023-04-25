<?php

namespace App\Http\Controllers;

use App\Custom\Deal;
use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function addToOrder(Request $request) {
        session_start();

        $pizzas = Pizza::all();

        $pizza_size = $request['size'];

        foreach ($pizzas as $pizza) {
            if ($request['id'] == $pizza->id) {
                $_SESSION['order'][] = [$pizza->id, $pizza->name, $pizza_size, $pizza->$pizza_size];
                $_SESSION['pizzas_with_no_deal_applied'][] = [$pizza->id, $pizza->name, $pizza_size, $pizza->$pizza_size];
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
        $order->via = $_SESSION['via'];
        $order->deal_id = $_SESSION['deal'];
        $order->deal_price = $_SESSION['deal_price'];

        $order->save();

        if ($_SESSION['deal'] == null) {
            $this->orderPizzaStore($_SESSION['order']);
        }
        else {
            $this->orderPizzaStore($_SESSION['pizzas_with_no_deal_applied']);

            foreach($_SESSION['pizzas_with_deal_applied'] as $pizza) {
                $order_pizza = new OrderPizza;

                $order_pizza->order_id = $this->getNextOrderID();
                $order_pizza->pizza_id = $pizza[0];
                $order_pizza->size = $pizza[2];
                $order_pizza->price = 0.00;

                $order_pizza->save();
            }
        }

        session_destroy();

        return redirect('home');
    }

    private function orderPizzaStore($variable) {
        foreach($variable as $pizza) {
            $order_pizza = new OrderPizza;

            $order_pizza->order_id = $this->getNextOrderID();
            $order_pizza->pizza_id = $pizza[0];
            $order_pizza->size = $pizza[2];
            $order_pizza->price = $pizza[3];

            $order_pizza->save();
        }
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
