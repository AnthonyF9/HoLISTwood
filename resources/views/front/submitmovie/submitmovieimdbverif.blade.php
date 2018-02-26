@extends('front/submitmovie/layoutsubmitmovie')

@section('title')
  Add a movie - HOLISTWOOD
@endsection

@section('activesubmitmoviebyimdb')
active @endsection

@section('content-alpha')
  <div class="part">
    <h1>Add a movie</h1>
  </div>
@endsection

@section('content-beta')
<div id="submitmovie-content">
  <div class="part">
    @if (isset($movie['Title']) && !empty($movie['Title']) && $movie['Title'] !='N/A' && isset($movie['Plot']) && !empty($movie['Plot']) && $movie['Plot'] !='N/A')
      @php
        $title = $movie['Title'];
        // echo $title;
        $serie = strstr($title,'Episode');
      @endphp
      @if ($serie != FALSE)
        <div class="imdb-alert alert-error" role="alert">
          <p>Ceci est une série, non un movie.</p>
        </div>
      @else
        @php
          if (isset($movie['Year']) && !empty($movie['Year'])) { $year = $movie['Year']; } else { $year = 'N/A'; }
          if (isset($movie['Runtime']) && !empty($movie['Runtime'])) { $runtime = $movie['Runtime']; } else { $runtime = 'N/A'; }
          if (isset($movie['Director']) && !empty($movie['Director'])) { $director = $movie['Director']; } else { $director = 'N/A'; }
          if (isset($movie['Writer']) && !empty($movie['Writer'])) { $writers = $movie['Writer']; } else { $writers = 'N/A'; }
          if (isset($movie['Actors']) && !empty($movie['Actors'])) { $actors = $movie['Actors']; } else { $actors = 'N/A'; }
          if (isset($movie['Plot']) && !empty($movie['Plot'])) { $plot = $movie['Plot']; } else { $plot = 'N/A'; }
          if (isset($movie['Awards']) && !empty($movie['Awards'])) { $awards = $movie['Awards']; } else { $awards = 'N/A'; }
          if (isset($movie['Poster']) && !empty($movie['Poster'])) { $poster = $movie['Poster']; } else { $poster = 'N/A'; }
          if (isset($movie['imdbID']) && !empty($movie['imdbID'])) { $imdb_id = $movie['imdbID']; } else { $imdb_id = 'N/A'; }
          if (isset($movie['Production']) && !empty($movie['Production'])) { $production = $movie['Production']; } else { $production = 'N/A'; }
          if (isset($movie['Website']) && !empty($movie['Website'])) { $website = $movie['Website']; } else { $website = 'N/A'; }
          if (isset($movie['Genre']) && !empty($movie['Genre'])) { $genre = $movie['Genre']; } else { $genre = 'N/A'; }
        @endphp

        {!! Form::open(['route' => 'addmoviebyimdb', 'method' => 'post']) !!}
          <p class="formulaire">
            {!! Form::label('title', 'Title ', ['class' => '']) !!}
            {!! Form::text('title', $title, ['placeholder' => 'Title', 'class' => '']) !!}
          </p>
            {!! $errors->first('title','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('year', 'Year ', ['class' => '']) !!}
            {!! Form::text('year', $year, ['placeholder' => 'year', 'class' => '']) !!}
          </p>
            {!! $errors->first('year','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('runtime', 'Runtime ', ['class' => '']) !!}
            {!! Form::text('runtime', $runtime, ['placeholder' => 'runtime', 'class' => '']) !!}
          </p>
            {!! $errors->first('runtime','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('director', 'Director ', ['class' => '']) !!}
            {!! Form::text('director', $director, ['placeholder' => 'director', 'class' => '']) !!}
          </p>
            {!! $errors->first('director','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('writers', 'Writers ', ['class' => '']) !!}
            {!! Form::text('writers', $writers, ['placeholder' => 'writers', 'class' => '']) !!}
          </p>
            {!! $errors->first('writers','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('actors', 'Actors ', ['class' => '']) !!}
            {!! Form::textarea('actors', $actors, ['placeholder' => 'actors', 'class' => '']) !!}
          </p>
            {!! $errors->first('actors','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('plot', 'Plot ', ['class' => '']) !!}
            {!! Form::textarea('plot', $plot, ['placeholder' => 'plot', 'class' => '']) !!}
          </p>
            {!! $errors->first('plot','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('awards', 'Awards ', ['class' => '']) !!}
            {!! Form::textarea('awards', $awards, ['placeholder' => 'awards', 'class' => 'award']) !!}
          </p>
            {!! $errors->first('awards','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('poster', 'Poster URL ', ['class' => '']) !!}
            {!! Form::textarea('poster', $poster, ['placeholder' => 'poster', 'class' => 'poster']) !!}
          </p>
            {!! $errors->first('poster','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('imdb_id', 'ID IMDB ', ['class' => '']) !!}
            {!! Form::text('imdb_id', $imdb_id, ['placeholder' => 'imdb_id', 'class' => '']) !!}
          </p>
            {!! $errors->first('imdb_id','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('production', 'Production ', ['class' => '']) !!}
            {!! Form::text('production', $production, ['placeholder' => 'production', 'class' => '']) !!}
          </p>
            {!! $errors->first('production','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('website', 'Website ', ['class' => '']) !!}
            {!! Form::text('website', $website, ['placeholder' => 'website', 'class' => '']) !!}
          </p>
            {!! $errors->first('website','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('genre', 'Genre ', ['class' => '']) !!}
            {!! Form::text('genre', $genre, ['placeholder' => 'genre', 'class' => '']) !!}
          </p>
            {!! $errors->first('genre','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('status', 'Status ', ['class' => '']) !!}
            {!! Form::select('status',['out'=>'Out','incoming'=>'Incoming'], 'out') !!}
          </p>
            {!! $errors->first('status','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::label('release_date', 'Release date ', ['class' => '']) !!}
            {!! Form::date('release_date') !!}
          </p>
            {!! $errors->first('release_date','<div class="alert-error" role="alert">:message</div>') !!}
          <p class="formulaire">
            {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
          </p>
        {!! Form::close() !!}


      @endif
    @else
      <div class="imdb-alert alert-error" role="alert">
        <p>This movie does not exist.</p>
        <p><a href="{{ route('submitmoviebyimdb') }}">Go back.</a></p>
      </div>
    @endif
  </div>
</div>
@endsection
