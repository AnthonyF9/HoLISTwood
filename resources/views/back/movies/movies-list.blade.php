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
          <td><a class="btn btn-primary" href="{{ route('modifierfilm', array('id'=> $movie->id )) }}"> Edit </a>
            {{ Form::open(['route' => ['deletemovie', $movie->id],'method' => 'delete']) }}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {{ Form::close() }}
          </td>
        </tr>

    @endforeach

      </tbody>
      </table>


  </div>
@endsection
