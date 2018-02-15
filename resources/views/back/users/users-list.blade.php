@extends('layouts/backlayout')

@section('title')
  Users list - HOLISTWOOD
@endsection

@section('activeuserslist','active')

@section('content-alpha')
  <div class="part">
    <h1>Users list</h1>
  </div>
@endsection



@section('content-beta')

  <div class="part">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{ $users->links() }}

    <table class="table table-hover table-light">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Created</th>
          <th>Updated</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach ($users as $user)

        <tr>
          <td scope="row">{{ $user->id }}</td>
          <td scope="row">{{ $user->name }}</td>
          <td scope="row">{{ $user->email }}</td>
          <td scope="row">{{ $user->role }}</td>
          <td scope="row">{{ $user->created_at }}</td>
          <td scope="row">{{ $user->updated_at }}</td>
          <td><a class="btn btn-primary" href="{{ route('edituser', array('id'=> $user->id )) }}"> Edit </a></td>
        </tr>

    @endforeach

      </tbody>
      </table>


  </div>
@endsection
