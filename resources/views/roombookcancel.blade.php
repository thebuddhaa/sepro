@extends('app')

@section('scripts')
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>
    <script src="/js/transition.js"></script>
    <script src="/js/collapse.js"></script>

    <script>

        $(function(){
            $('#startdatetime,#enddatetime').datetimepicker({
                minDate: moment(1, 'H'),
                format: 'DD-MM-YYYY HH:mm'
            });
        });
        //        $('#enddatetime').data("DateTimePicker").show();
    </script>

@endsection

@section('content')


    <h2>Cancel booked Room:</h2>

    {!! Form::open(array('url' => 'roombookcancel_action')) !!}

    <div class='col-sm-6'>

        <div class="form-group">
            {!! Form::label('User:') !!}
            {!! Form::text('user', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Enter Username')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Booking ID:') !!}
            {!! Form::text('bookingid', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Enter Booking ID')) !!}
        </div>

        {{--<div class="form-group">--}}
            {{--{!! Form::label('Room No:') !!}--}}
            {{--{!! Form::text('room_no', null,--}}
                {{--array('required',--}}
                      {{--'class'=>'form-control',--}}
                      {{--'placeholder'=>'Room No')) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('Start Time:') !!}--}}
            {{--{!! Form::input('date','starttime', null,--}}
                {{--array('required',--}}
                      {{--'class'=>'form-control',--}}
                      {{--'placeholder'=>'Enter start time',--}}
                      {{--'id'=>'startdatetime')) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('End Time:') !!}--}}
            {{--{!! Form::input('date','endtime', null,--}}
                {{--array('required',--}}
                      {{--'class'=>'form-control',--}}
                      {{--'placeholder'=>'Enter end time',--}}
                      {{--'id'=>'enddatetime')) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('Event name:') !!}--}}
            {{--{!! Form::text('purpose', null,--}}
                {{--array('required',--}}
                      {{--'class'=>'form-control',--}}
                      {{--'placeholder'=>'Enter Event Name')) !!}--}}
        {{--</div>--}}

        <div class="form-group">
            {!! Form::submit('Cancel Booking',
              array('class'=>'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endsection
