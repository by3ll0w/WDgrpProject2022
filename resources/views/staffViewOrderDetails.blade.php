@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Topping</td>
                    <td>Noodle</td>
                    <td>Size</td>
                    <td>Quantity</td>
                    <td>Price (unit)</td>
                    <td>Price (Total)</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach($food as $food)

                <tr>

                    <td>{{$food->ToppingName}}</td>
                    <td>{{$food->Noodle}}</td>
                    <td>{{$food->size}}</td>
                    <td>{{$food->quantity}}</td>
                    <td>{{$food->unitPrice}}</td>
                    <td>{{$food->totalPrice}}</td>

                    <td>
                    <a href="{{ route('staffEditFood',$food->id) }}" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
                    <a href="{{ route('deleteFood',$food->id) }}" class="btn btn-primary btn-sm">{{__('Remove')}}</a>
                    </td>
                </tr>



                @endforeach
            </tbody>

        </table>
        <div>
            <h1>Total: RM

                {{$total}}

            </h1>


        </div>
    </div>
    <div class="col-sm-3">

    </div>



</div>
@endsection