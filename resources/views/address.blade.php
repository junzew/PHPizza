@extends('layout')
@section('content')
<div class="container">
            <h1>Address form</h1>
        <form action="/order/address" method="POST">
                <div class="col-lg-2">
                    City<input type="text" name="city" class="form-control">
                </div>
                <div class="col-lg-2">
                    Street number:<input type="text" name="streetnum" class="form-control">
                </div>
                <div class="col-lg-2">
                    Apartment number:<input type="text" name="apartmentnum" class="form-control">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
</div>

@stop