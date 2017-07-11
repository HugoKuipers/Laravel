@extends("main")

@section("title", "- $post->title")
@section("content")
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>{{ $post->title }}</h1>
      <p>{!! $post->body !!}</p>
      <hr>
      <p>Posted in: {{ $post->category->name }}</p>
      <p>Tags:
        <?php $i = 1; ?>
        @foreach($post->tags as $tag)
          <span>{{ $tag->name }}{{ (count($post->tags) > $i) ? " - " : "" }}</span>
          <?php $i += 1; ?>
        @endforeach
      </p>
    </div>
  </div>
@endsection
