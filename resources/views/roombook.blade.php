@extends('app')

@section('scripts')
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>
    <script src="/js/transition.js"></script>
    <script src="/js/collapse.js"></script>

    <script>


        $(function(){
            $('#startdatetime,#enddatetime').datetimepicker({
                useCurrent: false,
                minDate: moment(1, 'h')
            });
            $("#startdatetime").on("dp.change", function (e) {
                $("#enddatetime").data("DateTimePicker").minDate(e.date);
            });
            $("#enddatetime").on("dp.change", function (e) {
                $("#startdatetime").data("DateTimePicker").maxDate(e.date);
            });
        });
        //        $('#enddatetime').data("DateTimePicker").show();
    </script>

@endsection

@section('content')


    <h2>Book Room:</h2>

    {!! Form::open(array('url' => 'roombook_action')) !!}

    <div class='col-sm-6'>

        <div class="form-group">
            {!! Form::label('Room No:') !!}
            {!! Form::text('room_no', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Room No')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Start Time:') !!}
            {!! Form::text('starttime', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Enter start time',
                      'id'=>'startdatetime')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('End Time:') !!}
            {!! Form::text('endtime', null,
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
        </div>
    </div>
    {!! Form::close() !!}

@endsection
