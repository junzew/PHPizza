@extends('layout')
@section('content')
<div class="container">
            <h1>How do we contact you?</h1>
        <form action="/order/address" method="POST">
                <div>
                    Phone Number:<input type="text" name="phone" class="form-control">
                </div>
                <div>
                    First Name:<input type="text" name="first_name" class="form-control">
                </div>
                <div>
                    Last Name:<input type="text" name="last_name" class="form-control">
                </div>
                <div>
                    Deliver address:<input type="text" name="address" class="form-control">
                </div>
                <br>
                <div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

        <p><br><a href="/signup">Sign up</a> to skip this page every time you order.</p>
</div>

@stop