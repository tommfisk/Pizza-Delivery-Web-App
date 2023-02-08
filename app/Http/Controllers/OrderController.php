<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPizza;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Custom\Deal;

class OrderController extends Controller
{
    public function getOrder() {
        $user = Auth::user();
        $pizzas = Pizza::all();
        return view('order', compact('user', 'pizzas'));
    }

    public function addToOrder(Request $request) {
        session_start();

        $_SESSION['order'][] = $request['pizza_id'];

        return redirect('home');
    }

    public function store(Request $request) {

        // Firstly, check deals
//        foreach($request['deals'] as $deal) {
//            switch ($deal) {
//                case 1:
//                    Deal::bogOf($request['medium_pizzas'], $request['large_pizzas']);
//                    break;
//                case 2:
//                    Deal::threeForTwo();
//                    break;
//                case 3:
//                    Deal::familyFeast();
//                    break;
//                case 4:
//                    Deal::twoLarge();
//                    break;
//                case 5:
//                    Deal::twoMedium();
//                    break;
//                case 6:
//                    Deal::twoSmall();
//                    break;
//            }
//        }

        // Order table
        $order = new Order;

        $order->user_id = $request['user_id'];
        $order->total = $request['total'];
        $order->via = $request['via'];

        $order->save();

        // Order_pizza table, new row for each pizza ordered
        foreach($request['all_pizzas'] as $pizza_id => $quantity) {
            $order_pizza = new OrderPizza;

            $order_pizza->order_id = $this->getNextOrderID();
            $order_pizza->pizza_id = $pizza_id;
            $order_pizza->quantity = $quantity;

            $order_pizza->save();
        }

        session_start();
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
