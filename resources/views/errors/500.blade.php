@extends('layouts/frontlayout')

@section('title', 'Page Not Found')

@section('css')
  <style>

      main {
        position: relative;
        height: 50vh;
        padding: 0;
        width: 100%;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .content {
          text-align: center;
      }

      .title {
          font-size: 36px;
          padding: 20px;
          color: #FFF;
          font-family: 'Raleway', sans-serif;
      }
      .title h1 {
        font-size: 3em;
        font-weight: bold;
        color: #2392F0;
      }
      a {
        text-decoration: none;
        color: #2392F0;
      }
      #retour {
        font-size: 0.8em;
      }
      #myBtn {
        color: white;
      }
  </style>
@endsection

@section('content-error')
  <div class="content">
      <div class="title">
        <h1>500</h1>
          Whoops, looks like something went wrong.
          <a href="{{ route('home') }}"><p id="retour">Home</p></a>
      </div>
  </div>
@endsection
