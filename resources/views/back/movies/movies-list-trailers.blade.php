@extends('layouts/backlayout')

@section('title')
  Movies list - HOLISTWOOD
@endsection

@section('activemovieslisttrailers','active')

@section('content-alpha')
  <div class="part">
    <h1>Movies list trailers</h1>
    <a href="{{ route('addtrailerfornewmovie') }}" class="btn btn-primary">Add a new movie trailer</a>
  </div>
@endsection



@section('content-beta')
  <div class="part">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- search --}}

    {!! Form::open(['route' => 'searchMovieWithtrailer', 'method' => 'get'])  !!}
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input  type="text" name="research" class="form-control input-lg" placeholder="Enter a movie title" />
                    <span class="input-group-btn">
                        <button  class="btn btn-primary btn-lg" type="submit">
                          Search
                        </button>
                    </span>
                </div>
            </div>
    {!! Form::close() !!}

          </br>

    {{ $movies->links() }}

    <table class="table table-light movieslist table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>IMDB ID </th>
          <th>Trailer</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach ($movies as $movie)

        <tr>
          <td scope="row">{{ $movie->id }}</td>
          <td scope="row">{{ $movie->title }}</td>
          <td scope="row">{{ $movie->imdb_id }}</td>
          <td scope="row">{{ $movie->url_trailer }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('addtrailers', array('id'=> $movie->id )) }}"> Change trailer </a>
          </td>
        </tr>

    @endforeach

      </tbody>
      </table>


  </div>
@endsection
