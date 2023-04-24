<?php

    $total = 0.00;

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
        <div class="flex-container">
            <div class="card">
                <table>
                    <tr>
                        <th>Pizza</th>
                        <th>Size</th>
                        <th>Price</th>
                    </tr>

                    @foreach($_SESSION['order'] as $pizza)
                        <tr>
                            <td>{{ $pizza[1] }}</td>
                            <td>{{ ucfirst($pizza[2]) }}</td>
                            <td>{{ "£".number_format($pizza[3], 2) }}</td>
                        </tr>
                            <?php $total += $pizza[3] ?>
                    @endforeach
                </table>
            </div>

            {{-- Total/Form Table --}}
            <div class="card">
                <div class="card-body">
                    <h2>Total: {{ "£".number_format($total, 2) }}</h2>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                        <form method="post" action="{{ route('via') }}" >
                            @csrf
                            <input name="via" value="delivery" hidden>
                            <input type="submit" value="Delivery" @if($_SESSION['via'] == 'delivery')style="background-color:lightgreen"@endif>
                        </form>
                        <form method="post" action="{{ route('via') }}">
                            @csrf
                            <input name="via" value="collection" hidden>
                            <input type="submit" value="Collection" @if($_SESSION['via'] == 'collection')style="background-color:lightgreen"@endif>
                        </form>
                    </div>
                    @if($_SESSION['via'] == 'delivery')
                        <p>Delivery to: {{ $user->postcode }}</p>
                    @endif
                </div>
                <div class="card-body">
                    {{-- Store order data in database --}}
                    <form method="post" action="{{ route('store') }}">
                        @csrf

                        {{-- Order Model data --}}
                        <input name="user_id" value="{{ $user->id }}" hidden>
                        <input name="total" value="{{ $total }}" hidden>

                        <h4>Deal: {{ $deal }}</h4>
                        <input class="btn btn-primary" type="submit" value="Order">
                    </form>
                </div>
            </div>
        </div>
    @else
        <h1 style="text-align: center">Order a pizza from our delicious menu and view it here</h1>
    @endif

@endsection
