<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Deal;

class DealController extends Controller
{

    public function checkDeal(Request $request) {
//        session_start();
//
//        $_SESSION['order_nodeal'] = $_SESSION['order'];
//
//        $_SESSION['order_deal'] = [];
//        $_SESSION['order_deal']['small'] = [];
//        $_SESSION['order_deal']['medium'] = [];
//        $_SESSION['order_deal']['large'] = [];
//
//        switch($request['deal']) {
//            case 0:
//                $_SESSION['deal'] = null;
//                return redirect('deals');
//            case 1:
//                if (Deal::bogof()) {
//                    return $this->addDeal($request);
//                }
//                else {
//                    return redirect('deals');
//                }
//            case 2:
//                if(Deal::threeForTwo()) {
//                    return $this->addDeal($request);
//                }
//                else {
//                    return redirect('deals');
//                }
//        }
    }

    private function addDeal(Request $request) {
//
//        $_SESSION['deal'] = $request['deal'];
//
//        return redirect('deals');
    }

}
