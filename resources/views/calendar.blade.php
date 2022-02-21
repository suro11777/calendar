@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h3 class="page-title"></h3>
            <div class="card">
                <div class="card-body">
                    <div id='calendar'>
                        <div class="month">
                            <ul>
                                <a href="{{route('calendar', ['date' => $thisDate->copy()->subMonthsNoOverflow()])}}"><li class="prev">&#10094;</li></a>
                                <a href="{{route('calendar', ['date' => $thisDate->copy()->addMonthsNoOverflow()])}}"><li class="next">&#10095;</li></a>
                                <li>
                                    {{$thisDate->monthName}}
                                    <br>
                                    <span style="font-size:18px">{{$thisDate->year}}</span>
                                </li>
                            </ul>
                        </div>

                        <ul class="weekdays">
                            @foreach(\Carbon\Carbon::getDays() as $wDays)
                                <li>{{$wDays}}</li>
                            @endforeach
                        </ul>
                        <ul class="days">
                            @for($i = 1; $i <= $thisDate->daysInMonth; $i++)
                                <a href="{{route('appointments.create')}}"><li>
                                <span @if($i == $thisDate->day && \Carbon\Carbon::now()->format('y-m-d') == $thisDate->format('y-m-d')) class="active" @endif>
                                    {{$i}}
                                </span>
                                </li></a>
                            @endfor
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
