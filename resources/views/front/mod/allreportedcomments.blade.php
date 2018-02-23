@extends('layouts/frontlayout')

@section('title')
  Reported comments - HOLISTWOOD
@endsection

@section('activereportedcomments')
active @endsection

@section('content')
  reported comments
  <div>
    @if (isset($reportedcomments))
      <table>
        <tr>
          <th>ID comment</th>
          <th>Comment</th>
          <th>User</th>
          <th>Movie</th>
          <th>Actions</th>
        </tr>
        {{-- {{ dd($reportedcomments) }} --}}
        @foreach ($reportedcomments as $key => $reportedcomment)
          <tr>
            <td>{{ $reportedcomment->id }}</td>
            <td>{{ $reportedcomment->content }}</td>
            <td>{{ $reportedcomment->name }}</td>
            <td>{{ $reportedcomment->title }}</td>
            <td>Action man !</td>
          </tr>
        @endforeach
      </table>
    @endif
  </div>
@endsection
