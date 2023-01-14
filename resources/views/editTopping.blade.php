@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Rename Topping</h3>


        <form action="{{route('updateTopping',$topping->id)}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @method('PUT')
            <div class="form-group">

                <label for="editTopping">Rename Topping</label>
                <input class="form-control" type="text" id="toppingName" name="toppingName" value={{$topping->name}} required>

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Rename</button>
        </form>


        <br><br>
    </div>
    <div class="col-sm-3"></div>



</div>
@endsection