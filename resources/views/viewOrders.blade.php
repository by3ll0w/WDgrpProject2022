@extends('layouts/customerlayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">

        <br>
        <h1>Orders</h1><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Items</td>
                    <td>Total</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>

                    <td>
                        @foreach($items as $item)
                        @if($item->OrderID==$order->id)

                        {{$item->quantity}} x {{$item->ToppingName}} {{$item->Noodle}} ({{$item->size}}) - RM{{$item->totalPrice}}

                        <br>
                        @endif

                        @endforeach
                    </td>

                    <td>
                        {{$total[$order->id]}}
                    </td>

                    <td>{{$order->status}}</td>

                    <td>


                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>

        <br>
    </div>

    <div class="col-sm-3"></div>



</div>








@endsection