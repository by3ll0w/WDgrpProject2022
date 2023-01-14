@extends('layouts/stafflayout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Rename Noodle Type</h3>


        <form action="{{route('updateNoodleType',$noodleType->id)}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @method('PUT')

            <div class="form-group">

                <label for="editNoodleType">Rename Noodle Type</label>
                <input class="form-control" type="text" id="noodleTypeName" name="noodleTypeName" value={{$noodleType->name}} required>

            </div>

            <button type="submit" class="btn btn-primary">Rename</button>

        </form>


        <br><br>
    </div>
    <div class="col-sm-3"></div>



</div>
@endsection