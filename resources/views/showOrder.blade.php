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
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>



                    </td>
                    <td>{{$order->status}}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <br>
    </div>

    <div class="col-sm-3"></div>



</div>








@endsection