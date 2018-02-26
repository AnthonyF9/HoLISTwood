@extends('layouts/frontlayout')

@section('title')
  Movies List - HOLISTWOOD
@endsection

@section('activemovieslist')
active @endsection

@section('content')

@section('bandeau')
    <div class="bandeau bandeau-movieslist">
      <h2> &mdash; list of movies ({{ $totalmovies }}) &mdash;</h2>
    </div>
@endsection

<div class="searchbar">
  <input type="text" class="form-controller" id="searchmovies" name="searchmovies" placeholder="Find movies by title, year, actor, director..."></input>
</div>


<div class="affiches affichesfront" id="affichesfront">


    <div class="pagination">
      <div id="paginationlinks" class="paginatemovieslist">{{ $movies->links() }}</div>
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
         <div id="paginationlinks" class="paginatemovieslist">{{ $movies->links() }}</div>
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
        var timer;

        $('#searchmovies').on('keyup',function(){
          $value=$(this).val();
          if($value.length>= 3){
            clearTimeout(timer) // clear the request from the previous event
            timer = setTimeout(function() {
            $.ajax({
              type : 'get',
              url : '{{route('searchfrontmovies')}}',
              data:{'search':$value},
              success:function(response){
                // console.log(response);
                $('#affichesfront').html(response.output);
              }
            });
          }, 400);
          } else if ($value.length == 0) {
            clearTimeout(timer) // clear the request from the previous event
            timer = setTimeout(function() {
            $.ajax({
              type : 'get',
              url : '{{route('searchfrontmovies')}}',
              data:{'search':$value},
              success:function(response){
                // console.log(response);
                $('#affichesfront').html(response.outputfull);
              }
            });
          }, 200);
          }
        })





    </script>
  @endsection

@endsection
