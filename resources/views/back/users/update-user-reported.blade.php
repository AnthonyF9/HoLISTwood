@extends('layouts/backlayout')

@section('title')
  Edit one user - HOLISTWOOD
@endsection

@section('activeusersreported','active')

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

    {!! Form::open(['route' => ['edituserreported-action', $id], 'method' => 'put']) !!}
      <p class="formulaire">
        {!! Form::label('name', 'Name : ', ['class' => '']) !!}
        {!! Form::text('name', $user->name, ['placeholder' => 'Name', 'class' => '']) !!}
      </p>
        {!! $errors->first('name','<div class="" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('email', 'Email : ', ['class' => '']) !!}
        {!! Form::text('email', $user->email, ['placeholder' => 'ex : john.doe@gmail.com', 'class' => '']) !!}
      </p>
        {!! $errors->first('email','<div class="" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::label('role', 'Role : ', ['class' => '']) !!}
        {!! Form::select('role',['admin'=>'Admin','mod'=>'Moderator','user'=>'User','banned'=>'Banned'],$user->role) !!}
      </p>
        {!! $errors->first('role','<div class="" role="alert">:message</div>') !!}
      <p class="formulaire">
        {!! Form::submit("Edit", ['class' => 'btn btn-primary']) !!}
      </p>
    {!! Form::close() !!}

  </div>
@endsection
