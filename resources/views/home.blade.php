@extends('layouts.customerlayout')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">



                <div class="card-body">

                    <img src="{{ asset('images/bowls.png') }}" , width="500" , height="250">
                    <h2>Step 1: Select Size</h1>
                        <img src="{{ asset('images/noodle.png') }}" , width="500" , height="250">
                        <h2>Step 2: Select Noodle Type</h1>
                            <img src="{{ asset('images/dish.png') }}" , width="500" , height="250">
                            <h2>Step 3: Select Topping</h1>

                </div>
                @guest
                @if (Route::has('login'))

                <a class="btn btn-success" href='{{ route("login") }}'>{{__('Login to Order')}}</a>

                @endif
                @else
                <a class="btn btn-success" href='{{ route("newItem") }}'>
                    {{ __('Start Ordering!') }}
                </a>

                @endguest <br>
            </div>

        </div>

    </div>

</div>
@endsection