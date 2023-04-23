<?php
    session_start();

    $total = 0.00;

    if (!isset($_SESSION['deal'])) {
        $_SESSION['deal'] = null;
    }

    if (!isset($_SESSION['via'])) {
        $_SESSION['via'] = 'delivery';
    }

    if(!$_SESSION['deal'] == null) {
        foreach($deals as $deal_model) {
            if($deal_model->id == $_SESSION['deal']) {
                $deal = $deal_model->deal_name;
            }
        }
    }
    else {
        $deal = 'None';
    }


?>
@extends('layouts.app')

@section('title', 'Secure page')

@section('content')

    {{-- If the session array is not empty then display order information --}}
    @if(count($_SESSION['order']) != 0)
        <h2 style="text-align: center">Hi {{ $user->firstname }}, this is your order so far</h2>

        {{-- Order Table --}}
        <table class="col-sm-9 text-md-end">
            <tr>
                <th>Pizza</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>

            {{-- Takes order session and groups ids by quantity --}}
            <?php $order_with_quantities = array_count_values($_SESSION['order']) ?>

            {{-- Iterates through each pizza id --}}
            @foreach($order_with_quantities as $pizza_id => $quantity)
                {{-- Then iterates through each pizza in the model and compares ids --}}
                @foreach($pizzas as $pizza)
                    {{-- If the pizza id in the order matches with a row in the model, it will be output --}}
                    @if($pizza_id == $pizza->id)

                        <tr>
                            <td>{{ ucfirst(implode(" ", explode("_", $pizza->pizza_name))) }}</td>
                            <td>{{ ucfirst($pizza->pizza_size) }}</td>
                            <td>{{ "£".number_format($pizza->pizza_price * $quantity, 2) }} </td>
                            <td>{{ $quantity }} </td>
                        </tr>

                        <?php $total += $pizza->pizza_price * $quantity; ?>

                    @endif
               @endforeach
            @endforeach
        </table>


        {{-- Total/Form Table --}}
        <table class="col-sm-9 text-md-end">
            <tr>
                <th>Total</th>
            </tr>
            <tr>
                <td>{{ "£".number_format($total, 2) }}</td>
            </tr>
            <tr>
                <td>
                    <br>
                    {{-- Store order data in database --}}
                    <form method="post" action="{{ route('store') }}">
                        @csrf

                        {{-- Order Model data --}}
                        <input name="user_id" value="{{ $user->id }}" hidden>
                        <input name="total" value="{{ $total }}" hidden>
                        <input type="radio" id="delivery" name="via" value="delivery" checked>
                        <label for="delivery">Delivery</label>
                        <input type="radio" id="collection" name="via" value="collection" >
                        <label for="collection">Collection</label>
                        <input name="deal" value="{{ $_SESSION['deal'] }}" hidden>

                        {{-- OrderPizza Model data + with grouping of sizes --}}
                        @foreach($order_with_quantities as $pizza_id => $quantity)
                            <input name="all_pizzas[{{ $pizza_id }}]" value="{{ $quantity }}" hidden>
                        @endforeach

                        <p>Deal: {{ $deal }}</p>
                        <p>Delivery to: {{ strtoupper($user->postcode) }}</p>
                        <p>We'll call you at {{ $user->phone }} if anything goes wrong!</p>
                        <input type="submit" value="Order">
                    </form>
                </td>
            </tr>
        </table>
    @else
        <h1 style="text-align: center">Order a pizza from our delicious menu and view it here</h1>
    @endif

@endsection
