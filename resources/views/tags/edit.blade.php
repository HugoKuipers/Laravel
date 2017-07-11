@extends("main")

@section("title", "- Edit $tag->name Tag")
@section("content")

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="well">
        {!! Form::model($tag, ["route"=>["tags.update", $tag->id], "method"=>"PUT"]) !!}

          {{ Form::label("name", "Tag Name:") }}
          {{ Form::text("name", null, ["class"=>"form-control"]) }}

          {{ Form::submit("Edit Tag", ["class"=>"btn btn-primary btn-block btn-h1-spacing"])}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>

@endsection
