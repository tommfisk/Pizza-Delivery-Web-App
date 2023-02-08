<?php
    session_start();

    $pizza_groups['small'] = [];
    $pizza_groups['medium'] = [];
    $pizza_groups['large'] = [];
    $total = 0.00

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


                        {{-- Grouping each pizza id into a size category --}}
                        @if($pizza->pizza_size == 'small')

                                <?php $pizza_groups['small'][$pizza->id] = $quantity  ?>

                        @elseif($pizza->pizza_size == 'medium')

                                <?php $pizza_groups['medium'][$pizza->id] = $quantity ?>

                        @else
                                <?php $pizza_groups['large'][$pizza->id] = $quantity ?>

                        @endif

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

                        {{-- OrderPizza Model data + with grouping of sizes --}}
                        @foreach($order_with_quantities as $pizza_id => $quantity)
                            <input name="all_pizzas[{{ $pizza_id }}]" value="{{ $quantity }}" hidden>
                        @endforeach

                        @foreach($pizza_groups['small'] as $pizza_id => $quantity)
                            <input name="small_pizzas[{{ $pizza_id }}]" value="{{ $quantity }}" hidden>
                        @endforeach
                        @foreach($pizza_groups['medium'] as $pizza_id => $quantity)
                            <input name="medium_pizzas[{{ $pizza_id }}]" value="{{ $quantity }}" hidden>
                        @endforeach
                        @foreach($pizza_groups['large'] as $pizza_id => $quantity)
                            <input name="large_pizzas[{{ $pizza_id }}]" value="{{ $quantity }}" hidden>
                        @endforeach

                        {{-- Deal information --}}
                        <p>Deals</p>
                        <input type="checkbox" id="bogoff" name="deals[]" value="1">
                        <label for="bogoff">BOGOFF</label><br>
                        <input type="checkbox" id="three_for_two" name="deals[]" value="2">
                        <label for="three_for_two">Three for Two</label><br>
                        <input type="checkbox" id="family_feast" name="deals[]" value="3">
                        <label for="family_feast">Family Feast</label><br>
                        <input type="checkbox" id="two_large" name="deals[]" value="4">
                        <label for="two_large">Two Large</label><br>
                        <input type="checkbox" id="two_medium" name="deals[]" value="5">
                        <label for="two_medium">Two Medium</label><br>
                        <input type="checkbox" id="two_small" name="deals[]" value="6">
                        <label for="two_small">Two Small</label><br>

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
