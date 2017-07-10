@extends("main")

@section("title", "- $post->title")
@section("content")
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ $post->title }}</h1>
      <p>{{ $post->body }}</p>
      <hr>
      <p>Posted in: {{ $post->category->name }}</p>
      <p>Tags:
        @foreach($post->tags->name as $tag)
          <span>{{ $tag }}</span>
        @endforeach
      </p>
    </div>
  </div>
@endsection
