@extends('app')

@section('content')

<h1> Welcome {{ $user["username"] }} </h1>
<div class="container">
	<div class="row">
    	<div class='col-sm-6'>
    		This is your Info: 
    		<p> Name: {{ $user["name"] }}
    		Email: {{ $user["email"] }}

    	</div>
   	</div>
</div>

@endsection