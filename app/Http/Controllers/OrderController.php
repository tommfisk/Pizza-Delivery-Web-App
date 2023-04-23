<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Custom\Deal;

class OrderController extends Controller
{

    public function addToOrder(Request $request) {
        session_start();

        $_SESSION['order'][] = $request['pizza_id'];

        return redirect('home');
    }

    public function checkDeal(Request $request) {
        session_start();

        $_SESSION['order_nodeal'] = $_SESSION['order'];

        $_SESSION['order_deal'] = [];
        $_SESSION['order_deal']['small'] = [];
        $_SESSION['order_deal']['medium'] = [];
        $_SESSION['order_deal']['large'] = [];

        switch($request['deal']) {
            case 0:
                $_SESSION['deal'] = null;
                return redirect('deals');
            case 1:
                if (Deal::bogof()) {
                    return $this->addDeal($request);
                }
                else {
                    return redirect('deals');
                }
//            case 2:
//                if(Deal::threeForTwo()) {
//                    return $this->addDeal($request);
//                }
//                else {
//                    return redirect('deals');
//                }
        }
    }

    private function addDeal(Request $request) {

        $_SESSION['deal'] = $request['deal'];

        return redirect('deals');
    }

    public function store(Request $request) {

        // Order table
        $order = new Order;

        $order->user_id = $request['user_id'];
        $order->total = $request['total'];
        $order->via = $request['via'];
        $order->deal_id = $request['deal'];

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
