@extends('layouts/frontlayout')

@section('title')
  Moderation - HOLISTWOOD
@endsection

@section('activemoderation')
active @endsection

@section('content')

  <div>
    <h1>Reported comments</h1>
    @if (isset($reportedcomments))
      <table>
        <tr>
          <th>ID comment</th>
          <th>Comment</th>
          <th>User reported</th>
          <th>User reportman</th>
          <th>Movie</th>
          <th>Actions</th>
        </tr>
        @foreach ($reportedcomments as $key => $reportedcomment)
          <tr>
            <td>{{ $reportedcomment->id }}</td>
            <td>{{ $reportedcomment->content }}</td>
            <td>{{ $reportedcomment->user_reported }}</td>
            <td>{{ $reportedcomment->user_reportman }}</td>
            <td>{{ $reportedcomment->title }}</td>
            <td>
              {!! Form::open(['route' => 'commentIsOk', 'method' => 'post']) !!}
                {!! Form::hidden('reportedcomment_id', $reportedcomment->id) !!}
                {!! Form::submit("Moderation is ok", ['class' => 'comment-is-ok']) !!}
              {!! Form::close() !!}
              <a href="{{ route('oneMovieAuth', array( 'imdb_id'=> $reportedcomment->imdb_id )) }}#comment{{ $reportedcomment->id_comment }}" class="view-comment">View in the page</a>
              {!! Form::open(['route' => 'deleteComment', 'method' => 'put']) !!}
                {!! Form::hidden('reportedcomment_id', $reportedcomment->id) !!}
                {!! Form::submit("Delete", ['class' => 'delete-comment']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </table>
    @endif
  </div>

  <div>
    @if (session('status'))
      <div>
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
      </div>
    @endif

    @if (isset($reportedusers))
      Reported users :
      (Only admins can bannish users, moderators can only ask for)
      <table>
        <tr>
          <th>User reported ID</th>
          <th>User reported name</th>
          <th>Moderator name</th>
        </tr>
        @foreach ($reportedusers as $key => $reporteduser)
          <tr>
            <td>{{ $reporteduser->id }}</td>
            <td>{{ $reporteduser->name_user_reported }}</td>
            <td>{{ $reporteduser->name_mod }}</td>
          </tr>
        @endforeach
      </table>
    @endif

    <h1>Asking for bannish user</h1>

    {!! Form::open(['route' => 'askingbannishuser', 'method' => 'post']) !!}
      {!! Form::hidden('id_mod', Auth::user()->id) !!}
      {!! Form::hidden('name_mod', Auth::user()->name) !!}
      <p>
        {!! Form::text('name_user_reported', null, ['placeholder' => 'Name of the user you want to ban', 'class' => '']) !!}
      </p>
      {!! $errors->first('name_user_reported','<div class="alert-error" role="alert">:message</div>') !!}
      @if (session('error'))
        <div>
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        </div>
      @endif
      <p>
        {!! Form::textarea('why', null, ['placeholder' => 'Reason of asking bannishment', 'class' => '']) !!}
      </p>
      {!! $errors->first('why','<div class="alert-error" role="alert">The reason of asking bannishment is required.</div>') !!}
      <p>
        {!! Form::submit("Report an user", ['class' => 'report-user']) !!}
      </p>
    {!! Form::close() !!}
  </div>
@endsection
