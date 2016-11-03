@extends('layout')
@section('content')
        <h1>Address form</h1>
        <form action="/order/address" method="POST" class="form-inline">
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
                    <button type="submit">submit</button>
                </div>
        </form>
@stop