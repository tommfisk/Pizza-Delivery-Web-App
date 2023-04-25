@extends('layouts.app')

@section('title', 'Secure page')

@section('content')
    @if($errors->any())
        <div class="flex-container">
            <h4 style="color:red">{{$errors->first()}}</h4>
        </div>
    @endif

    <div class="flex-container">
        <div @if($_SESSION['deal'] == null)style="background-color:lightgreen"@endif>
            <h2>No Deal</h2>
            <form method="post" action="{{ route('check_deal') }}">
                @csrf
                <input name="deal" value="0" hidden>
                <button type="submit" class="btn btn-primary">
                    <p>Select</p>
                </button>
            </form>
        </div>
    </div>

    @foreach($deals as $deal)
        <div class="flex-container">
            <div @if($_SESSION['deal'] == $deal->id)style="background-color:lightgreen"@endif>
                <h2>{{ $deal->deal_name }}</h2>
                <p>{{ $deal->deal_description }}</p>
                <form method="post" action="{{ route('check_deal') }}">
                    @csrf
                    <input name="deal" value="{{ $deal->id }}" hidden>
                    <button type="submit" class="btn btn-primary">
                        <p>Select deal</p>
                    </button>
                </form>
            </div>
        </div>
    @endforeach

@endsection
