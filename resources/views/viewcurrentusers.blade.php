@extends('app')

@section('content')

        <!-- Page Content -->
<div class="row">
    <div class="col-lg-12 text-left">
        <h1>List of Users</h1>

        <table border="2" class="table table-striped table-bordered table-responsive table-hover" data-height="400" >
            <tr>
                <th >User ID</th>
                <th >Username</th>
                <th >Name</th>
                <th >Email</th>
                <th >Role</th>
                <th >Status</th>
            </tr>
            @foreach($allusers as $user)
                <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->username}} </td>
                    <td> {{$user->name}} </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td> {{$user->status}} </td>

                </tr>
            @endforeach
        </table>
    </div>
</div>
<!-- /.row -->

@endsection