@extends('app')

@section('scripts')
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>
    <script src="/js/transition.js"></script>
    <script src="/js/collapse.js"></script>

    <script>

        $(function () {
            $('#startdatetime,#enddatetime').datetimepicker({
                minDate: new Date(),
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

            // On capacity change make an ajax call
            $("#capacityreq").change(function() {
                lastValue = $("#capacityreq").val();
                console.log('I am definitely sure the text box realy realy changed this time' + lastValue);
                var url = window.location;
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: "POST",
                    url: url + "/cap",
                    data: {_token: CSRF_TOKEN,data1: lastValue},
                    success: function(response){
//                            alert("here is the response: " + response);
                        console.log(response);

                        var model = $('#room_no');
                        model.empty();
                        $.each(response, function(index, element) {
                            model.append("<option value='"+ element +"'>" + element + "</option>");
                        });

                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            });
//            var lastValue = '';
//            setInterval(function() {
//                if ($("#capacityreq").val() != lastValue) {
//                    lastValue = $("#capacityreq").val();
//                    console.log('I am definitely sure the text box realy realy changed this time' + lastValue);
//                    var url = window.location;
//                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
//                    $.ajax({
//                        type: "POST",
//                        url: url + "/cap",
//                        data: {_token: CSRF_TOKEN,data1: lastValue},
//                        success: function(response){
////                            alert("here is the response: " + response);
//                            console.log(response);
//                        },
//                        error: function(e) {
//                            console.log(e.responseText);
//                        }
//                    });
//                }
//            }, 500);

        });
        //        $('#enddatetime').data("DateTimePicker").show();
    </script>

@endsection

@section('content')


    <h2>Book Room:</h2>

    @if(session('statusmsg'))
        <div class="alert alert-danger">
            {{ session('statusmsg') }}
        </div>
    @endif

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
                    {!! Form::label('Event type:') !!}
                    {!! Form::select('eventtype', [null=>'Please Select'] +$eventtypes,'S',
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Event Type')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Estimated room capacity:') !!}
                    {!! Form::text('capacity', null,
                        array('required',
                              'class'=>'form-control',
                              'placeholder'=>'Enter estimated room capacity for event',
                              'id'=>'capacityreq')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Room No:') !!}
                    {{--{!! Form::select('room_no', $rooms,'S',--}}
                        {{--array('required',--}}
                              {{--'class'=>'form-control',--}}
                              {{--'placeholder'=>'Room No',--}}
                              {{--'id'=>'room_no')) !!}--}}
                    <select id="room_no" name="room_no" class = "form-control">
                        <option>Please choose capacity</option>
                    </select>
                </div>


                <div class="form-group">
                    {!! Form::submit('Book Now',
                      array('class'=>'btn btn-success')) !!}
                    {!! Form::reset('Reset',
                      array('class'=>'btn btn-default')) !!}
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <div class="col-lg-6">
        <img src="images/tablet-1.jpg" class="img-thumbnail" style="width: ;: 110%; height: 60%;">
    </div>

@endsection
