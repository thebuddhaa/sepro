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


    <h2>Add Room:</h2>

    {!! Form::open(array('url' => 'roomaddaction')) !!}

    <div class='col-sm-6'>

        <div class="form-group">
            {!! Form::label('Room No:') !!}
            {!! Form::text('room_no', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Room No')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Location:') !!}
            {!! Form::text('location', null,
                array('required',
                'class'=>'form-control',
                'placeholder'=>'Location')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Room Type:') !!}
            {!! Form::text('room_type', null,
            array('required',
            'class'=>'form-control',
            'placeholder'=>'Room_type')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Capacity:') !!}
            {!! Form::text('capacity', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Capacity')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Facility:') !!}
            {!! Form::text('facility', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Facility')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add Room',
              array('class'=>'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}

    <div class="col-lg-6">
        <img src="images/roompaint.jpg" class="img-thumbnail img-responsive" >
    </div>

@endsection
