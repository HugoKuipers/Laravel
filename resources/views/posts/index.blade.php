@extends("main")

@section("title", "- All Posts")
@section("content")
  <div class="row">
    <div class="col-md-10">
      <h1>All Posts</h1>
    </div>
    <div class="col-md-2">
      <a href="{{ route("posts.create") }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th>
          <th>title</th>
          <th>Body</th>
          <th>Created At</th>
          <th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <th>{{ $post->id }}</th>
              <td>{{ substr($post->title, 0, 30) }}{{ strlen($post->title) > 30 ? "..." : "" }}</td>
              <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
              <td>{{ date("j M Y - H:i", strtotime($post->created_at)) }}</td>
              <td>
                {!! Html::linkRoute("posts.show", "View", array($post->id), array("class"=>"btn btn-default btn-sm")) !!}
                {!! Html::linkRoute("posts.edit", "Edit", array($post->id), array("class"=>"btn btn-default btn-sm")) !!}
                {!! Html::linkRoute("posts.destroy", "Delete", array($post->id), array("class"=>"btn btn-default btn-sm")) !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">
        {!! $posts->links(); !!}
      </div>
    </div>
  </div>
@endsection
