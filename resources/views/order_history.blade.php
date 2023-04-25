@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Order History</h1>

    @foreach($orders as $order)
        @if($user->id == $order->user_id)
            <div class="flex-container">
                <div class="card">
                    <div class="card-header">
                        <h2>Order ID: #{{ $order->id }}</h2>
                    </div>
                    <div class="card-body">
                        @if($order->deal_id == null)
                            <p>Deal: None</p>
                        @else
                            @foreach($deals as $deal)
                                @if($deal->id == $order->deal_id)
                                    <p>Deal: {{$deal->deal_name}}</p>
                                @endif
                            @endforeach
                        @endif
                        <p>Via: {{ ucfirst($order->via)}}</p>
                        <p>Total: {{ "£".number_format($order->total, 2) }}</p>
                        <form method="POST" action="{{ route('details') }}">
                            @csrf
                            <input name="order_selected" value="{{ $order->id }}" hidden>
                            <button class="btn btn-primary" type="submit">View Details</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach


@endsection
