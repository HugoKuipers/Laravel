@extends("main")

@section("title", "- create new post")
@section("stylesheets")
  {!! Html::style("css/Parsley.css") !!}
@endsection

@section("content")
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1>Create new post</h1>
      <hr>
      {!! Form::open(array("route"=>"posts.store", "data-parsley-validate"=>"")) !!}
        {{ Form::label("title", "Title:") }}
        {{ Form::text("title", "Give me a title!", array("class"=>"form-control", "required"=>"", "maxlength"=>"255")) }}

        {{ Form::label("body", "Post Body:") }}
        {{ Form::textarea("body", "Write stuff here", array("class"=>"form-control", "required"=>"")) }}

        {{ Form::submit("Create Post", array("class"=>"btn btn-success btn-lg btn-block")) }}
      {!! Form::close() !!}
    </div>
  </div>
@endsection

@section("scripts")
  {!! Html::script("js/Parsley.js") !!}
@endsection
