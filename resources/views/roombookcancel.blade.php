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
        });
        //        $('#enddatetime').data("DateTimePicker").show();
    </script>

@endsection

@section('content')


    <h2>Cancel booked Room:</h2>

    @if(session('statusmsg'))
        <div class="alert alert-success">
            {{ session('statusmsg') }}
        </div>
    @endif

    {!! Form::open(array('url' => 'roombookcancel_action')) !!}

    <div class='col-sm-6'>
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
                              'readonly' =>'true',
                              'placeholder'=>'Enter Username')) !!}
                </div>

                {{--@foreach( $bookedrooms as $room)--}}
                {{--{{ $room }}--}}
                {{--@endforeach--}}

                <div class="form-group">
                    {!! Form::label('Booking ID:') !!}
                    {!! Form::select('bookingid', $bookedrooms,'S',
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Enter Booking ID')) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Cancel Booking',
                      array('class'=>'btn btn-primary')) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
