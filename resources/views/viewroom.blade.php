@extends('app')

@section('content')

        <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12 text-left">
            <h1>List of Rooms</h1>

            <table border="2" class="table table-striped table-bordered table-hover table-responsive" data-height="400" >
                <tr class="info">
                    <th >Room number</th>
                    <th >Location</th>
                    <th >Room type</th>
                    <th >Capacity</th>
                    <th >Facility</th>
                </tr>
                @foreach($lsofrooms as $result)
                    <tr>
                        <td> {{$result->room_no}} </td>
                        <td> {{$result->location}} </td>
                        <td> {{$result->room_type}} </td>
                        <td>{{$result->capacity}}</td>
                        <td> {{$result->facility}} </td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- /.row -->



@endsection