<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Pizza;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index() {
        return view('home');
    }

    public function viewDeals() {
        $pizzas = Pizza::all();
        $deals = Deal::all();
        return view('deal', compact('pizzas', 'deals'));
    }

    public function viewCheckout() {
        $user = Auth::user();
        $pizzas = Pizza::all();
        $deals = Deal::all();
        return view('checkout', compact('user', 'pizzas', 'deals'));
    }
}
