@extends('app')

@section('content')

        <!-- Page Content -->
<div class="container">

    <div class="row">

        <h1 style="text-align: center">Room Booking Portal</h1>

        <h2>Welcome {{$hname->name}},</h2>
        {{--<p class="lead">This is a Room Booking Portal.</p>--}}

        {{--<div class="jumbotron">--}}

        {{--<div class="col-lg-12">--}}
        {{--<img src="images/auditorium-572776_1280.jpg" style="max-width:100%;max-height:100%;">--}}
        {{--</div>--}}
        <div class="col-lg-12">

        </div>
        <div class="col-lg-9 text-left" style="background-image: url(" images
        /auditorium-572776_1280.jpg")">

        @if(!empty($user_earlier_booked))
            <div class="col-lg-12 text-left">
                <h3>Your bookings are: </h3>
                <table border="2" class="table table-striped table-bordered table-hover" data-height="400">
                    <tr>
                        <th>Booking ID</th>
                        <th>Room number</th>
                        <th>Purpose</th>
                        <th>Scheduled on</th>
                        <th>Scheduled upto</th>
                        <th>Booking Status</th>
                    </tr>
                    @foreach($user_earlier_booked as $result)
                        <tr>
                            <td> {{$result->id}} </td>
                            <td> {{$result->room_no}} </td>
                            <td> {{$result->purpose}} </td>
                            <td>{{$result->starttime}}</td>
                            <td> {{$result->endtime}} </td>
                            <td> @if($result->status == 'C')
                                    {{ "Confirmed" }}
                                @elseif($result->status == 'W')
                                    {{ "Waiting" }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="alert alert-dismissible alert-info">
                <p>You have no current bookings on any room.</p>
            </div>
        @endif
        @if($hname->role == 'admin')
            <div class="alert alert-dismissable alert-info">
                @if($nusers == 0)
                    <p>You have no new users to authorize.</p>
                @else
                    <p>You have <strong>{{$nusers}}</strong> new users to authorize.</p>
                @endif
            </div>
        @endif
    </div>
    <div class="col-lg-3 sidebar-offcanvas" id="sidebar">
        <div class="list-group">
            <a href="/roombook" class="list-group-item text-center"><strong>Make a new Booking</strong></a>
            <a href="/roombookcancel" class="list-group-item text-center"><strong>Cancel a Booking</strong></a>
            <a href="/prevbookings" class="list-group-item text-center"><strong>My Previous Bookings</strong></a>
            <a href="/bookedrooms" class="list-group-item text-center"><strong>Current Booked Rooms</strong></a>
            @if($hname->role == 'admin')
                <a href="/addroom" class="list-group-item text-center"><strong>Add a room</strong></a>
                <a href="/viewroom" class="list-group-item text-center"><strong>View rooms</strong></a>
                <a href="/viewusers" class="list-group-item text-center"><strong>View Current Users</strong></a>
                <a href="/confirmusers" class="list-group-item text-center"><strong>Authorize New Users</strong></a>
            @endif

            <a href="https://www.cse.iitb.ac.in/page191?Building=KR&floor=3"
               class="list-group-item text-center"><strong>Floor Plan</strong></a>

        </div>
    </div>
</div>
<!-- /.row -->

</div>

@endsection