<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Pizza;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index() {
        session_start();

        $pizzas = Pizza::all();

        $this->initialise();

        return view('home', compact('pizzas'));
    }

    public function viewDeals() {
        session_start();

        $pizzas = Pizza::all();
        $deals = Deal::all();

        return view('deal', compact('pizzas', 'deals'));
    }

    public function viewCheckout() {
        session_start();

        $user = Auth::user();
        $deals = Deal::all();

        return view('checkout', compact('user', 'deals'));
    }

    private function initialise() : void {
        if (!isset($_SESSION['order'])) {
            $_SESSION['order'] = [];
        }

        if (!isset($_SESSION['deal'])) {
            $_SESSION['deal'] = null;
        }

        if (!isset($_SESSION['via'])) {
            $_SESSION['via'] = 'delivery';
        }
    }
}
