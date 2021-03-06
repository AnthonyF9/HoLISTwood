@extends('layouts/frontlayout')

@section('title')
  Calender - HOLISTWOOD
@endsection

@section('activecalendar')
active @endsection

@section('bandeau')
  <div class="bandeau bandeau-calendar">
    <h2> &mdash; @if ( Auth::user()) My @endif Release Calendar &mdash; </h2>
    </div>
 @endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="calendrier">
                <div class="panel-body">
                    {!! $calendar->calendar() !!}

                </div>
                <div class="legend_calendar">
                  @if ( Auth::user())
                  <p class="red_legend"> Movies in my list </p>
                  @endif
                  <p class="blue_legend"> All movies releases</p>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
@endsection
