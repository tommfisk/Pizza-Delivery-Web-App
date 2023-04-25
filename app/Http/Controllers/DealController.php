<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Deal;
use Illuminate\Support\Facades\Redirect;

class DealController extends Controller
{
    public function via(Request $request) {
        session_start();

        $_SESSION['via'] = $request['via'];

        switch($_SESSION['deal']) {
            case 3:
            case 4:
            case 5:
            case 6:
                if ($request['via'] == 'delivery') {
                    $_SESSION['deal'] = null;
                    $_SESSION['deal_price'] = null;
                    return Redirect::back()->withErrors(['msg' => "Deal invalidated"]);
                }
        }
        return Redirect::back();
    }

    public function checkDeal(Request $request) {
        session_start();

        switch($request['deal']) {
            case 0:
                $_SESSION['deal'] = null;
                $_SESSION['deal_price'] = null;
                return Redirect::back();
            case 1:
                if (Deal::bogof('medium') || Deal::bogof('large')) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
            case 2:
                if (Deal::threeForTwo()) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
            case 3:
                if ($_SESSION['via'] == 'collection' && Deal::familyFeast()) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
            case 4:
                if ($_SESSION['via'] == 'collection' && Deal::twoLarge()) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
            case 5:
                if ($_SESSION['via'] == 'collection' && Deal::twoMedium()) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
            case 6:
                if ($_SESSION['via'] == 'collection' && Deal::twoSmall()) {
                    return $this->dealSuccess($request);
                }
                return $this->dealFailed();
        }

        return Redirect::back()->withErrors(['msg' => "Deal does not exist"]);
    }

    private function dealFailed() {
        return Redirect::back()->withErrors(['msg' => "Deal conditions aren't met"]);
    }

    private function dealSuccess(Request $request) {

        $_SESSION['deal'] = $request['deal'];

        return Redirect::back();
    }

}
