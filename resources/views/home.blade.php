@extends('layouts.customerlayout')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">



                <div class="card-body">
                    <img src="{{ asset('images/bowls.png') }}", width="700", height="300">
                    <img src="{{ asset('images/noodle.png') }}", width="700", height="300">

                    <img src="{{ asset('images/dish.png') }}", width="700", height="300">
                </div>

            </div>

        </div>

    </div>

</div>
@endsection