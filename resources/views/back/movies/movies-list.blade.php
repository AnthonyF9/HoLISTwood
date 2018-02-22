@extends('layouts/backlayout')

@section('title')
  Movies list - HOLISTWOOD
@endsection

@section('activemovieslist','active')

@section('content-alpha')
  <div class="part">
    <h1>Movies list</h1>
  </div>
@endsection



@section('content-beta')
  <nav id="nav-movies">
    <ul>
      <li><a href="{{ route('movieslist') }}">Movies list</a></li>
      <li>
        <a href="{{ route('moviesintrash') }}">Trash
          @if ($nbmoviesintrash > 0)
            ({{ $nbmoviesintrash }})
          @else
            (0)
          @endif
        </a>
      </li>
    </ul>
  </nav>

  <div class="part">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- search --}}

    {!! Form::open(['route' => 'search', 'method' => 'get'])  !!}
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input  type="text" name="research" class="form-control input-lg" placeholder="Enter word" />
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
          <th>Release</th>
          <th>Year</th>
          <th>Director </th>
          <th>IMDB ID </th>
          <th>Status</th>
          <th>Created</th>
          <th>Updated</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach ($movies as $movie)

        <tr>
          <td scope="row">{{ $movie->id }}</td>
          <td scope="row">{{ $movie->title }}</td>
          <td scope="row">{{ $movie->release_date }}</td>
          <td scope="row">{{ $movie->year }}</td>
          <td scope="row">{{ $movie->director }}</td>
          <td scope="row">{{ $movie->imdb_id }}</td>
          <td scope="row">{{ $movie->status }}</td>
          <td scope="row">{{ $movie->created_at }}</td>
          <td scope="row">{{ $movie->updated_at }}</td>
          <td>
            <a class="btn btn-primary" href="{{ route('editmovie', array('id'=> $movie->id )) }}"> Edit </a>
            {{ Form::open(['route' => ['softdeletemovie', $movie->id],'method' => 'put']) }}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {{ Form::close() }}
          </td>
        </tr>

    @endforeach

      </tbody>
      </table>


  </div>
@endsection
