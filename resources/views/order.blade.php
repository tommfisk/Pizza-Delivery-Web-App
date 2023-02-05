<?php
    session_start();
    $total = 0.00;
?>
@extends('layouts.app')

@section('title', 'Secure page')

@section('content')
    <h1 style="text-align: center">Your order</h1>

    <table class="col-md-8 text-md-end">
        <tr>
            <th>Pizza</th>
            <th>Size</th>
            <th>Price</th>
        </tr>
        @foreach($_SESSION['pizzas'] as $pizza_collection)
            @foreach($pizza_collection as $pizza)
                <tr>
                    <td>{{ ucfirst(implode(" ", explode("_", $pizza->pizza_name))) }}</td>
                    <td>{{ ucfirst($pizza->pizza_size) }}</td>
                    <td>{{ "£".number_format($pizza->pizza_price, 2) }} </td>
                </tr>
                <?php $total += $pizza->pizza_price ?>
            @endforeach
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th>Total</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>{{ "£".number_format($total, 2) }}</td>
        </tr>
    </table>
    <form method="post">
        <input type="radio" id="collection" name="via">
        <label for="collection">Collection</label>
        <input type="radio" id="delivery" name="via">
        <label for="delivery">Delivery</label>

    </form>
@endsection
