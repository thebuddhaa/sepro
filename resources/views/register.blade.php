
@extends('layouts.master')

@section('title','Registered!!')



@section('content')

    {!! Form::open(array('url' => 'register_action')) !!}

        <p>Name :</p>

        <p>{!! Form::text('name') !!}</p>
        <p>Ldap Id:</p>
        <p>{!! Form::text('username') !!}</p>

        <p>Email :</p>

        <p>{!! Form::text('email') !!}</p>

        <p>Password :</p>

        <p>{!! Form::password('password') !!}</p>

       

        <p>{!! Form::submit('Submit') !!}</p>

    {!! Form::close() !!}
@endsection