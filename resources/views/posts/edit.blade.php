@extends("main")

@section("title", "- edit post")
@section("style")
  {!! Html::style("css/Parsley.css") !!}
  {!! Html::style("css/select2.min.css") !!}
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'link code',
      menubar: false
    });
  </script>
@endsection

@section("content")
  <div class="row">
    {!! Form::model($post, array("route"=>["posts.update", $post->id], "method"=>"PUT", "data-parsley-validate"=>"")) !!}
    <div class="col-md-8">
      {{ Form::label("title", "Title:") }}
      {{ Form::text("title", null, array("class"=>"form-control input-lg", "required"=>"", "maxlength"=>"255")) }}

      {{ Form::label("slug", "Url Slug:", array("class"=>"form-spacing-top")) }}
      {{ Form::text("slug", null, array("class"=>"form-control", "required"=>"", "maxlength"=>"255", "minlength"=>"5", "unique"=>"")) }}

      {{ Form::label("category_id", "Category:", array("class"=>"form-spacing-top")) }}
      {{ Form::select("category_id", $categories, null, ["class"=>"form-control"]) }}

      {{ Form::label("tags", "Tags:", ["class"=>"form-spacing-top"]) }}
      {{ Form::select("tags[]", $tags, null, ["multiple", "class"=>"select2-multi form-control"]) }}

      {{ Form::label("body", "Post Body:", array("class"=>"form-spacing-top")) }}
      {{ Form::textarea("body", null, array("class"=>"form-control")) }}
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date("j M Y - H:i", strtotime($post->created_at)) }}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date("j M Y - H:i", strtotime($post->updated_at)) }}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {{ Form::submit("Save Changes", array("class"=>"btn btn-success btn-block")) }}
          </div>
          <div class="col-sm-6">
            {!! Html::linkRoute("posts.show", "Cancel", array($post->id), array("class"=>"btn btn-danger btn-block")) !!}
          </div>
        </div>
    </div>
    {!! Form::close() !!}
  </div>
@endsection

@section("scripts")
  {!! Html::script("js/Parsley.js") !!}
  {!! Html::script("js/select2.min.js") !!}
  <script>
    $(".select2-multi").select2();
    $(".select2-multi").select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger("change");
  </script>
@endsection
