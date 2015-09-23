@extends('app')

@section('content')

        <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-6 text-left">
                <h1>Welcome </h1>
                <p class="lead">This is an awesome Room Booking Portal. :)</p>
                <p>Supports: </p>
            </div>

            <div class="col-lg-6 text-left">
                <h1><a href="/roombook">Go To Room Booking</a> </h1>
                
                {!! Form::open(array('url' => 'roombook_action')) !!}
                <div class="container">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <select name="room_no">
                                    <option value="sic-201">sic-201</option>
                                    <option value="sic-205">sic-205</option>
                                    <option value="sic-205">sic-204</option>
                                </select>
                                <p>Date: <input type="text" id="datepicker"></p>
                                <p>Start Time :</p><p><input name="starttime" id="basicExample" type="text" class="time" /></p>
                                <p>End Time :</p><div class='input-group date' id='datetimepicker3'>
                                    <input name="endtime" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker3').datetimepicker({
                                    format: 'LT'
                                });
                            });
                        </script>
                    </div>
                </div>
                <p>Event name :</p>

                <p>{!! Form::text('purpose') !!}</p>

                <p>{!! Form::submit('Submit') !!}</p>
                {!! Form::close() !!}
                <p class="lead"></p>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container --></h1>


@endsection