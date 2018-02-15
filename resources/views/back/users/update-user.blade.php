@extends('layouts/backlayout')

@section('title')
  Edit one user - HOLISTWOOD
@endsection

@section('activeuserslist','active')

@section('content-alpha')
  <div class="part">
    <h1>Edit one user</h1>
  </div>
@endsection

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@section('content-beta')
  <div class="part">
    <h2> Edit <b>{{ $user->name }}</b> </h2>

    {!! Form::open(['route' => ['edituser-action', $id], 'method' => 'put']) !!}

      {!! Form::label('name', 'Name : ', ['class' => '']) !!}
      {!! Form::text('name', $user->name, ['placeholder' => 'Name', 'class' => '']) !!}
      {!! $errors->first('name','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('email', 'Email : ', ['class' => '']) !!}
      {!! Form::text('email', $user->email, ['placeholder' => 'ex : john.doe@gmail.com', 'class' => '']) !!}
      {!! $errors->first('email','<div class="" role="alert">:message</div>') !!}
    </br>
      {!! Form::label('role', 'Role : ', ['class' => '']) !!}
      {!! Form::select('role',['admin'=>'Admin','mod'=>'Moderator','user'=>'User','banned'=>'Banned']) !!}
      {!! $errors->first('role','<div class="" role="alert">:message</div>') !!}

      {!! Form::submit("Edit", ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

  </div>
@endsection
