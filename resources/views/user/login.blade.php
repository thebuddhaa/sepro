

@extends('layouts.master')

@section('title','Login Form')



@section('content')

{!! Form::open(array('url' => 'loginpost')) !!}
<h1>Login</h1>
@if(Session::has('error'))
<div class="alert-box success">
  <h2>{!! Session::get('error') !!}</h2>
</div>
@endif
<div class="controls">
{!! Form::text('username','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your Username')) !!}
<p class="errors">{!!$errors->first('username')!!}</p>
</div>
<div class="controls">
{!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
<p class="errors">{!!$errors->first('password')!!}</p>
</div>
<p>{!! Form::submit('Login', array('class'=>'send-btn')) !!}</p>
{!! Form::close() !!}


<!-- 
<form action="/loginpost/" method="POST">
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	<input type="text" name="username" /><br />
	<input type="password" name="password" /><br/>
	<input type="submit" />
</form> -->

@endsection