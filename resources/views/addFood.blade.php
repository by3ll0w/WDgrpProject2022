@extends('layouts/customerlayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add new Noodle</h3>


        <form action="{{route('newItem')}}" method="POST" enctype="multipart/form-data">
            @CSRF

            <div class="form-group">
                <label for="addFood">Add to Order</label>
                <br>
                <label for="foodSize">Size</label><br>
                <input type="radio" id="S" name="foodSize" value="S" checked="checked">
                <label for="S">S (RM 5.00)</label><br>
                <input type="radio" id="M" name="foodSize" value="M">
                <label for="M">M (RM 7.50)</label><br>
                <input type="radio" id="L" name="foodSize" value="L">
                <label for="L">L (RM 9.00)</label><br>

            </div>


            <div class="form-group">
                <label for="foodQuantity">Quantity</label>
                <input class="form-control" type="number" id="foodQuantity" name="foodQuantity" min="0" required>
            </div>

            <div class="form-group">
                <label for="NoodleType">Noodle Type</label>
                <select name="NoodleTypeID" id="NoodleTypeID" class="form-control">
                    @foreach($NoodleTypeID as $noodle_type)
                    <option value="{{$noodle_type->id}}">{{$noodle_type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Topping">Topping</label>
                <select name="ToppingID" id="ToppingID" class="form-control">
                    @foreach($ToppingID as $topping)
                    <option value="{{$topping->id}}">{{$topping->name}}</option>
                    @endforeach
                </select>
            </div>


            <br>
            <button type="submit" class="btn btn-primary">Order</button>
        </form>


        <br><br>
    </div>
    <div class="col-sm-3"></div>



</div>
@endsection