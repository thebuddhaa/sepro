@extends('app')

@section('content')

		<!-- Page Content -->
<div class="container">

	<div class="row">
		<div class="col-lg-6 text-left">
			<h1>Welcome {{$hname->name}}</h1>

			<p class="lead">This is a Room Booking Portal. </p>

			<div class="alert alert-dismissible alert-info">
				<p>Your registration is not yet confirmed. Please wait for confirmation.</p>
			</div>
		</div>
	</div>
	<!-- /.row -->

</div>


@endsection