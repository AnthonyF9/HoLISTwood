@extends('layouts/backlayout')

@section('title')
  Users reported - HOLISTWOOD
@endsection

@section('activeusersreported','active')

@section('content-alpha')
  <div class="part">
    <h1>Users reported</h1>
  </div>
@endsection



@section('content-beta')

  <div class="part">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{ $reportedusers->links() }}

    <table class="table table-hover table-light">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created</th>
          <th>Updated</th>
          <th>Mod reportman</th>
          <th>Reason</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @if (!empty($reportedusers[0]))
      @foreach ($reportedusers as $user)
        <tr>
          <td scope="row">{{ $user->id }}</td>
          <td scope="row">{{ $user->name_user_reported }}</td>
          <td scope="row">{{ $user->email }}</td>
          <td scope="row">{{ $user->role }}</td>
          <td scope="row">{{ $user->created_at }}</td>
          <td scope="row">{{ $user->updated_at }}</td>
          <td scope="row">{{ $user->name_mod }}</td>
          <td scope="row">{{ $user->why }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('editreporteduser', array('id'=> $user->id )) }}"> Edit </a>
            {!! Form::open(['route' => 'dontban', 'method' => 'post']) !!}
              {!! Form::hidden('user_id', $user->id) !!}
              {!! Form::submit("Don't ban", ['class' => 'btn btn-secondary']) !!}
            {!! Form::close() !!}
            {!! Form::open(['route' => 'ban', 'method' => 'post']) !!}
              {!! Form::hidden('user_id', $user->id) !!}
              {!! Form::submit("Ban", ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    @else
      <tr>
        <td colspan="9">No user reported.</td>
      </tr>
    @endif


      </tbody>
      </table>


  </div>
@endsection
