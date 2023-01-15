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
                        @if($order->status=="In Progress")
                        <a class="btn btn-danger" href="{{ route('cancelOrder',$order->id) }}" class="btn btn-primary btn-sm">{{__('Cancel')}}</a>
                        
                        @else
                        <a class="btn btn-danger" href="{{ route('deleteOrder',$order->id) }}" class="btn btn-primary btn-sm">{{__('Delete')}}</a>
                        @endif
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