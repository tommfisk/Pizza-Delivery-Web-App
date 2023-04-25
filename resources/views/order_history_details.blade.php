@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Order ID: #{{ $_SESSION['order_selected'] }}</h1>
    <div class="flex-container">
        <div class="card">
            <table>
                <tr>
                    <th>Pizza</th>
                    <th>Size</th>
                    <th>Price</th>
                </tr>
                @foreach($order_pizzas as $order_pizza)
                    @if($_SESSION['order_selected'] == $order_pizza->order_id)
                        @foreach($pizzas as $pizza)
                            @if($pizza->id == $order_pizza->pizza_id)
                                <tr>
                                    <td>{{ $pizza->name }}</td>
                                    <td>{{ ucfirst($order_pizza->size) }}</td>
                                    <td>{{ "£".number_format($order_pizza->price, 2) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </table>
        </div>
        <div class="card">
            @foreach($orders as $order)
                @if($order->id == $_SESSION['order_selected'])
                    @if($order->deal_id == null)
                        <p>Deal: None</p>
                    @else
                        @foreach($deals as $deal)
                            @if($deal->id == $order->deal_id)
                                <p>Deal: {{$deal->deal_name}}</p>
                            @endif
                        @endforeach
                        <p>Deal price: {{ "£".number_format($order->deal_price, 2) }}</p>
                    @endif
                    <p>Via: {{ ucfirst($order->via)}}</p>
                    <p>Total: {{ "£".number_format($order->total, 2) }}</p>
                @endif
            @endforeach
        </div>
    </div>
@endsection
