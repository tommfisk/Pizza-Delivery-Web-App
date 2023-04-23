@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Menu</h1>

    @foreach($pizzas as $pizza)
        <div class="flex-container">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $pizza->name }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $pizza->description }}</p>
                    <form method="POST" action="{{ route('add_to_order') }}">
                        @csrf
                        <input name="id" value="{{ $pizza->id }}" hidden>
                        <select id="pizza" name="size" >
                            <option value="small">Small</option>
                            <option value="medium">Medium</option>
                            <option value="large">Large</option>
                        </select>
                        <input type="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
    @endforeach

@endsection
