@extends('app')

@section('content')

        <!-- Page Content -->
<div class="row">
    <div class="col-lg-10 text-left">
        <h2>List of Users pending for confirmation</h2>

        <table border="2" class="table table-striped table-bordered" data-height="400">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Confirm</th>
                <th>Delete</th>
            </tr>

            @foreach($newusers as $newuser)
                {!! Form::open(array('url' => 'authorizeuser')) !!}
                <tr>
                    <td>
                        <div class="form-group">
                            {!! Form::text('uid', $newuser->id,
                                array('required',
                                      'class'=>'form-control',
                                      'readonly' =>'true')) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::text('user', $newuser->username,
                                array('required',
                                      'class'=>'form-control',
                                      'readonly' =>'false')) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::text('name', $newuser->name,
                                array('required',
                                      'class'=>'form-control',
                                      'readonly' =>'false')) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::text('email', $newuser->email,
                                array('required',
                                      'class'=>'form-control',
                                      'readonly' =>'false')) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::submit('Confirm User',
                              array('name'=> 'confirm',
                                    'class'=>'btn btn-success')) !!}
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {!! Form::submit('Delete User',
                              array('name'=> 'delete',
                                    'class'=>'btn btn-danger')) !!}
                        </div>
                    </td>
                </tr>
                {!! Form::close() !!}
            @endforeach

        </table>
    </div>
    <div class="col-lg-2">
        @if(session('statusmsg'))
            <div class="alert alert-success">
                {{ session('statusmsg') }}
            </div>
        @endif
    </div>

</div>
<!-- /.row -->


@endsection