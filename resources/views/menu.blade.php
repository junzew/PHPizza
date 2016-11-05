@extends('layout')

@section('content')
<div class="container">
	    <h1>Menu page</h1>
	    @if (session('message'))
		    <div class="alert alert-success">
		        {{ session('message') }}
		    </div>
		@endif
</div>
@stop