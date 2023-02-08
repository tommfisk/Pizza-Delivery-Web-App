<?php
    session_start();

//  Checks if Session array is set. If it's not, then it gets declared.
    if(!isset($_SESSION['order'])){
        $_SESSION['order'] = [];
    }
?>
@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Menu</h1>

    {{-- Div for list of pizzas where each form is a pizza with respective drop down lists for sizes. --}}
    <div class="card-body">
        <form method="POST" action="{{ route('add_to_order') }}">
            @csrf
            <div class="row mb-3">
                <label for="pizza" class="col-md-4 col-form-label-lg text-md-end">Original</label>
                <p class="col-md-4 col-form-label-sl text-md-end">Cheese, tomato sauce</p>
                <div class="col-md-4">
                    <select id="pizza" name="pizza_id" >
                        <option value="1">Small</option>
                        <option value="2">Medium</option>
                        <option value="3">Large</option>
                    </select>
                    <input type="submit" value="+">
                </div>
            </div>
        </form>
        <form method="POST" action="{{ route('add_to_order') }}">
            @csrf
            <div class="row mb-3">
                <label for="pizza" class="col-md-4 col-form-label-lg text-md-end">Gimme the Meat</label>
                <p class="col-md-4 col-form-label-sl text-md-end">Pepperoni, ham, chicken, minced beef, sausage, bacon</p>
                <div class="col-md-4">
                    <select id="pizza" name="pizza_id" >
                        <option value="4">Small</option>
                        <option value="5">Medium</option>
                        <option value="6">Large</option>
                    </select>
                    <input type="submit" value="+">
                </div>
            </div>
        </form>
        <form method="POST" action="{{ route('add_to_order') }}">
            @csrf
            <div class="row mb-3">
                <label for="pizza" class="col-md-4 col-form-label-lg text-md-end">Veggie Delight</label>
                <p class="col-md-4 col-form-label-sl text-md-end">Onions, green peppers, mushrooms, sweetcorn</p>
                <div class="col-md-4">
                    <select id="pizza" name="pizza_id" >
                        <option value="7">Small</option>
                        <option value="8">Medium</option>
                        <option value="9">Large</option>
                    </select>
                    <input type="submit" value="+">
                </div>
            </div>
        </form>
        <form method="POST" action="{{ route('add_to_order') }}">
            @csrf
            <div class="row mb-3">
                <label for="pizza" class="col-md-4 col-form-label-lg text-md-end">Make Mine Hot</label>
                <p class="col-md-4 col-form-label-sl text-md-end">Chicken, onions, green peppers, jalapeno peppers</p>
                <div class="col-md-4">
                    <select id="pizza" name="pizza_id" >
                        <option value="10">Small</option>
                        <option value="11">Medium</option>
                        <option value="12">Large</option>
                    </select>
                    <input type="submit" value="+">
                </div>
            </div>
        </form>
    </div>
@endsection
