@extends('layout')
@section('content')
<script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

    $('#contact').validate({ // initialize the plugin
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            phone: {
                required: true
            },
            address: {
                required: true
            }
        },
        messages: {
            first_name: "Please enter your first name",
            last_name: "Please enter your last name",
            phone: "Please enter your phone number",
            address: "Please enter your address"
        }
    });
});
</script>
<div class="container">
            <h1>How do we contact you?</h1>
        <form id="contact" action="/order/address" method="POST">
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