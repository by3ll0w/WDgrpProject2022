@extends('layouts/stafflayout')
@section('content')



<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">

<li>
    <a class="nav-link" href="{{ route('viewTopping') }}">
     <h2>   {{ __('Toppings') }}</h2>
    </a>
</li>

<li>
    <a class="nav-link" href="{{ route('viewNoodleType') }}">
      <h2>  {{ __('Noodle Types') }}</h2>
    </a>
</li>

<li >
    <a class="nav-link" href="{{ route('showOrder') }}">
   <h2>     {{ __('View Orders') }}</h2>
    </a>
</li>
    </div>

    <div class="col-sm-3"></div>



</div>



@endsection