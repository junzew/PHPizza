@extends('layout')
@section('content')
<div class="container">
            <h1>Address form</h1>
        <form action="/order/address" method="POST">
                <div>
                    City<input type="text" name="city" class="form-control">
                </div>
                <div>
                    Street number:<input type="text" name="street" class="form-control">
                </div>
                <div>
                    Apartment number:<input type="text" name="apartment" class="form-control">
                </div>
                <div>
                    First Name:<input type="text" name="first_name" class="form-control">
                </div>
                <div>
                    Last Name:<input type="text" name="last_name" class="form-control">
                </div>
                <div>
                    Phone Number:<input type="text" name="phone" class="form-control">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
</div>

@stop