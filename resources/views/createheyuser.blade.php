@extends('app')

@section('content')
<div class="container">
	<div class="row">
    	<div class='col-sm-6'>
    		{!! Form::open() !!}
    			<div class="form-group">
    				{!! Form::label('name', 'Name:') !!}
    				{!! Form::text('name', null, ['class' => 'form-control']) !!}
    				{!! Form::label('username', 'Username:') !!}
    				{!! Form::text('username', null, ['class' => 'form-control']) !!}
    			</div>
    			<div class="form-group">
    				{!! Form::submit('Add User', ['class' => 'btn btn-primary form-control']) !!}
    			</div>
    		{!! Form::close() !!}
    	</div>
   	</div>
</div>



@endsection

@stop