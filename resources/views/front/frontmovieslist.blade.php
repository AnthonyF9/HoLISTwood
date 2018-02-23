@extends('layouts/frontlayout')

@section('title')
  Movies List - HOLISTWOOD
@endsection

@section('activemovieslist')
active @endsection

@section('content')

@section('bandeau')
    <div class="bandeau bandeau-movieslist">
      <h2> &mdash; list of movies &mdash; </h2>
      </div>
@endsection

{{-- search --}}

{{-- {!! Form::open(['route' => 'searchfrontmovies', 'method' => 'get'])  !!}
        <div id="">
            <div class="">
                <input  type="text" name="research" class="" placeholder="Enter word" />
                <span class="input-group-btn">
                    <button  class="" type="submit">
                      Search
                    </button>
                </span>
            </div>
        </div>
{!! Form::close() !!} --}}

<div class="searchbar">
  <input type="text" class="form-controller" id="searchmovies" name="searchmovies" placeholder="Search movies here"></input>
</div>

<div class="affiches affichesfront" id="affichesfront">

  <div class="pagination">
    <span id="paginationlinks" class="paginatemovieslist">{{ $movies->links() }}</span>
  </div>

    @foreach ($movies as $movie)
    <div class="grid">
      @if (Auth::user())
        <a href="{{ route('oneMovieAuth', array( 'imdb_id'=> $movie->imdb_id )) }}">
      @else
        <a href="{{ route('oneMovie', array( 'imdb_id'=> $movie->imdb_id )) }}">
      @endif
      <figure data-aos="fade-up" class="effect-zoe">
        <img src="{{$movie->poster}}" alt="{{$movie->title}}"/>
        <figcaption>
          <h2>{{$movie->title}}</h2>
        </figcaption>
      </figure>
      </a>
    </div>
     @endforeach

     <div class="pagination">
       <span id="paginationlinks" class="paginatemovieslist">{{ $movies->links() }}</span>
     </div>

</div>

@section('js')

  <script type="text/javascript">

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
</script>
  <script type="text/javascript">

    $('#searchmovies').on('keyup',function(){

      $value=$(this).val();
         if($value.length>= 3){

      $.ajax({
          type : 'get',
          url : '{{route('searchfrontmovies')}}',
          data:{'search':$value},
      success:function(response){
        console.log(response);

        $('#affichesfront').html(response.output);

        }
      });
    }
  })

  </script>

@endsection

@endsection
