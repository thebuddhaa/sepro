@extends('app')

@section('content')

		<!-- Page Content -->
<div class="container">

	<div class="row">
		<div class="col-lg-8 text-left">
			<h1>Welcome {{$hname->name}},</h1>

			<p class="lead">This is a Room Booking Portal.</p>
			@if(!empty($user_earlier_booked))
				<div class="col-lg-12 text-left">
					<h3>Your Previous bookings are: </h3>
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
				<div class="bg-primary">
					<p>You have no previous bookings</p>
				</div>
			@endif
		</div>
		<div class="col-lg-2 sidebar-offcanvas" id="sidebar">
			<div class="list-group">
				<a href="/roombook" class="list-group-item">Make a new Booking</a>

				<a href="/roombookcancel" class="list-group-item">Cancel a Booking</a>

				<a href="https://www.cse.iitb.ac.in/page191?Building=KR&floor=3" class="list-group-item">Floor Plan</a>

				<a href="/bookedrooms" class="list-group-item">Booked Rooms</a>

				@if($hname->role == 'admin')
					<h1><a href="/addroom">Add a room</a></h1>
					<h1><a href="/viewroom">View rooms</a></h1>
					<h1><a href="/confirmusers">Confirm Users</a></h1>
				@endif
			</div>

		</div>
	</div>
	<!-- /.row -->

</div>

@endsection