@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Rename Noodle Type</h3>


        <form action="{{route('updateOrderStatus',$order->id)}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @method('PUT')

            <div class="form-group">

                <label for="status">Change Order Status</label>
                <select name="status" id="status" class="form-control">

                    <option value="In Progress" {{$order->status=="In Progress" ? 'selected="selected"' : '' }}>In Progress</option>
                    <option value="Delivered" {{$order->status=="Delivered" ? 'selected="selected"' : '' }}>Delivered</option>
                    <option value="Cancelled" {{$order->status=="Cancelled" ? 'selected="selected"' : '' }}>Cancelled</option>


                </select>

            </div>

            <button type="submit" class="btn btn-primary">Rename</button>

        </form>


        <br><br>
    </div>
    <div class="col-sm-3"></div>



</div>
@endsection