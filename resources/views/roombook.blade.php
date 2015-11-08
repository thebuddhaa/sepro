@extends('app')

@section('scripts')
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>
    <script src="/js/transition.js"></script>
    <script src="/js/collapse.js"></script>

    <script>

        $(function () {
            $('#startdatetime,#enddatetime').datetimepicker({
                minDate: moment(1, 'H'),
                format: 'DD-MM-YYYY HH:mm'
            });
            $('#enddatetime').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#startdatetime").on("dp.change", function (e) {
                $('#enddatetime').data("DateTimePicker").minDate(e.date);
            });
            $("#enddatetime").on("dp.change", function (e) {
                $('#startdatetime').data("DateTimePicker").maxDate(e.date);
            });
        });
        //        $('#enddatetime').data("DateTimePicker").show();
    </script>

@endsection

@section('content')


    <h2>Book Room:</h2>

    {!! Form::open(array('url' => 'roombook_action')) !!}

    {{ csrf_field() }}
    <div class="col-lg-6">
        <div class='panel panel-primary'>
            <div class="panel-heading">
                {{--<h1 class="panel-title">Book Room:</h1>--}}
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {!! Form::label('User:') !!}
                    {!! Form::text('user', $uname,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Username')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Room No:') !!}
                    {!! Form::select('room_no', $rooms,'S',
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Room No')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Start Time:') !!}
                    {!! Form::input('date','starttime', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Enter start time',
                              'id'=>'startdatetime')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('End Time:') !!}
                    {!! Form::input('date','endtime', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Enter end time',
                              'id'=>'enddatetime')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Event name:') !!}
                    {!! Form::text('purpose', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Enter Event Name')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Book Now',
                      array('class'=>'btn btn-primary')) !!}
                    {!! Form::reset('Reset',
                      array('class'=>'btn btn-secondary')) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <div class="col-lg-6">
        <img src="images/tablet-1.jpg" style="width: 80%; height: 50%;">
    </div>

@endsection
