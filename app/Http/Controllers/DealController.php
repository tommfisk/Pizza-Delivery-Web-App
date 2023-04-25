<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Deal;
use Illuminate\Support\Facades\Redirect;

class DealController extends Controller
{

    public function checkDeal(Request $request) {
        session_start();

        switch($request['deal']) {
            case 0:
                $_SESSION['deal'] = null;
                $_SESSION['deal_price'] = null;
                return redirect('deals');
            case 1:
                if (Deal::bogof('medium') || Deal::bogof('large')) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
            case 2:
                if(Deal::threeForTwo()) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
        }
    }

    private function dealFailed() {
        return Redirect::back()->withErrors(['msg' => "Deal conditions aren't met"]);
    }

    private function dealSuccess(Request $request) {

        $_SESSION['deal'] = $request['deal'];

        return redirect('deals');
    }

}
