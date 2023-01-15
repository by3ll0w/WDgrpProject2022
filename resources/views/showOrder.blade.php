@extends('layouts/stafflayout')
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
                    <td>Customer</td>
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

                        {{$item->quantity}} x {{$item->ToppingName}} {{$item->Noodle}} ({{$item->size}}) - {{$item->totalPrice}}

                        <br>
                        @endif

                        @endforeach
                    </td>

                    <td>
                        {{$total[$order->id]}}

                    </td>

                    <td>
                        @foreach($users as $user)
                        @if($user->id==$order->UserID)
                        {{$user->name}}
                        @endif
                        @endforeach
                    </td>

                    <td>{{$order->status}}</td>
                    <td>
                    <a href="{{ route('staffViewOrderDetails',$order->id) }}" class="btn btn-primary btn-sm">{{__('Details')}}</a>
                    <a href="{{ route('editOrderStatus',$order->id) }}" class="btn btn-primary btn-sm">{{__('Change Status')}}</a>
                    <a class="btn btn-danger" href="{{ route('deleteOrder',$order->id) }}" class="btn btn-primary btn-sm">{{__('Delete')}}</a>
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