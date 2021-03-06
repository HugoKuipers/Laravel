@extends("main")

@section("content")
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Welcome to My Blog!</h1>
        <p class="lead">Thank you for visiting, this is a test site to practice Laravel. Please read the popular post!</p>
        {{-- <p><a class="btn btn-primary btn-lg" href="{{ $posts[0] ? "{{ route("blog.single", array($post->slug)) }}" : "#" }}" role="button">Popular Post</a></p> --}}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      @foreach($posts as $post)
        <div class="post">
          <h3>{{ substr($post->title, 0, 30) }}{{ strlen($post->title) > 30 ? "..." : "" }}</h3>
          <p>{{ substr(strip_tags($post->body), 0, 100) }}{{ strlen(strip_tags($post->body)) > 100 ? "..." : "" }}</p>
          {!! Html::linkRoute("blog.single", "Continue Reading", array($post->slug), array("class"=>"btn btn-primary")) !!}
        </div>
        <hr>
      @endforeach
    </div>
    <div class="col-md-3 col-md-offset-1">
      <h2>Sidebar</h2>
    </div>
  </div>
@endsection
