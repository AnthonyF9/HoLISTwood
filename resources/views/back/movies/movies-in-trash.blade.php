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

    <table class="table table-dark movieslist">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
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
          <th scope="row">{{ $movie->id }}</th>
          <th scope="row">{{ $movie->title }}</th>
          <th scope="row">{{ $movie->year }}</th>
          <th scope="row">{{ $movie->director }}</th>
          <th scope="row">{{ $movie->imdb_id }}</th>
          <th scope="row">{{ $movie->status }}</th>
          <th scope="row">{{ $movie->created_at }}</th>
          <th scope="row">{{ $movie->updated_at }}</th>
          <td>
            {{ Form::open(['route' => ['restoremovie', $movie->id],'method' => 'put']) }}
              {!! Form::submit('Restore', ['class' => 'btn btn-primary']) !!}
            {{ Form::close() }}
            <span id="myBtn" class="btn btn-danger">Delete</span>
            <span id="myModal" class="modal">
              <span class="modal-content">
                <span class="close">&times;</span>
                {{ Form::open(['route' => ['softdeletemovie', $movie->id],'method' => 'delete']) }}
                  <span id="question">Are you sure about it ?</span>
                  <span id="choices">
                    <span id="no-delete" class="btn btn-primary nodelete choice">No, don't delete</span>
                    {{-- <input type="text" name="" value="No, don't delete" class="btn btn-primary close choice"> --}}
                    {!! Form::submit('Yes, delete', ['class' => 'btn btn-danger choice']) !!}
                  </span>
                {{ Form::close() }}
              </span>
            </span>
          </td>
        </tr>

    @endforeach

      </tbody>
      </table>


  </div>
@endsection
