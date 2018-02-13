@extends('layouts/backlayout')

@section('title')
  Liste des films - HOLISTWOOD
@endsection

@section('activemovieslist','active')

@section('content-alpha')
  <div class="part">
    <h1>Liste des films</h1>
  </div>
@endsection



@section('content-beta')
  <div class="part">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{ $movies->links() }}

    <table class="table table-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Titre</th>
          <th>Année</th>
          <th>Réalisateur </th>
          <th>ID IMDB </th>
          <th>Statut</th>
          <th>Ajouté le</th>
          <th>Modifié le</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach ($movies as $movie)

        <tr>
          <th scope="row">{{ $movie->id }}</th>
          <th scope="row">{{ $movie->title }}</th>
          <th scope="row">{{ $movie->year }}</th>
          <th scope="row">{{ $movie->director }}</th>
          <th scope="row">{{ $movie->imdb_id }}</th>
          <th scope="row">{{ $movie->status }}</th>
          <th scope="row">{{ $movie->created_at }}</th>
          <th scope="row">{{ $movie->updated_at }}</th>
          <td><a href="{{ route('modifierfilm', array('id'=> $movie->id )) }}"> Modifier </a>
            {{ Form::open(['route' => ['deletemovie', $movie->id],'method' => 'delete']) }}
              {!! Form::submit('Supprimer', ['class' => 'bouton']) !!}
            {{ Form::close() }}
          </td>
        </tr>

    @endforeach

      </tbody>
      </table>


  </div>
@endsection
