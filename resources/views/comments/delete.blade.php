@extends('main')

@section('title', '- Delete Comment?')
@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Delete This Comment?</h1>
      <p>
        <strong>Name: {{ $comment->name }}<br></strong>
        <strong>Email: {{ $comment->email }}<br></strong>
        <strong>Comment: {{ $comment->comment }}<br></strong>
      </p>
      {{ Form::open(['route'=>['comments.destroy', $comment->id], 'method'=>'DELETE']) }}
        {{ Form::submit('Delete Comment!', ['class'=>'btn btn-lg btn-block btn-danger some-but-space']) }}
      {{ Form::close() }}
    </div>
  </div>

@endsection
