@extends('app')

@section('scripts')
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/bootstrap-datetimepicker.js"></script>
    <script src="/js/transition.js"></script>
    <script src="/js/collapse.js"></script>

@endsection

@section('content')


    <h2>Booked Rooms:</h2>
    <table border="2" class="table table-striped table-bordered table-responsive" data-height="400">
        <tr>
            <th>Room number</th>
            <th>Purpose</th>
            <th>Scheduled on</th>
            <th>Scheduled upto</th>
        </tr>
        @foreach($all_booked_rooms as $result)
            <tr>
                <td> {{$result->room_no}} </td>
                <td> {{$result->purpose}} </td>
                <td>{{$result->starttime}}</td>
                <td> {{$result->endtime}} </td>

            </tr>
        @endforeach
    </table>

@endsection
