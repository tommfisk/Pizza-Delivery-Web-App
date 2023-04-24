@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Order Id: #{{ $_SESSION['order_selected'] }}</h1>

    @foreach($order_pizzas as $order_pizza)
        @if($_SESSION['order_selected'] == $order_pizza->order_id)
            <div class="flex-container">
                <div class="card">
                    <table>
                        <tr>
                            <th>Pizza</th>
                            <th>Size</th>
                            <th>Price</th>
                        </tr>
                        @foreach($pizzas as $pizza)
                            @if($pizza->id == $order_pizza->pizza_id)
                                <tr>
                                    <td>{{ $pizza->name }}</td>
                                    <td>{{ ucfirst($order_pizza->size) }}</td>
                                    <td>{{ "£".number_format($order_pizza->price, 2) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
                <div class="card">
                    @foreach($orders as $order)
                        @if($order->id == $_SESSION['order_selected'])
                            <p>Total: {{ "£".number_format($order->total, 2) }}</p>
                            <p>Via: {{ ucfirst($order->via)}}</p>
                            @if($order->deal_id == null)
                                <p>Deal: None</p>
                            @else
                                @foreach($deals as $deal)
                                    @if($deal->id == $order->deal_id)
                                        <p>Deal: {{$deal->name}}</p>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
@endsection
