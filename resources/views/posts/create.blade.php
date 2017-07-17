@extends("main")

@section("title", "- create new post")
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
    <div class="col-md-8 col-md-offset-2">
      <h1>Create new post</h1>
      <hr>
      {!! Form::open(array("route"=>"posts.store", "data-parsley-validate"=>"", 'files'=>'true')) !!}
        {{ Form::label("title", "Title:") }}
        {{ Form::text("title", "Give me a title!", array("class"=>"form-control", "required"=>"", "maxlength"=>"255")) }}

        {{ Form::label("slug", "Url Slug:") }}
        {{ Form::text("slug", null, array("class"=>"form-control", "required"=>"", "maxlength"=>"255", "minlength"=>"5", "unique"=>"")) }}

        {{ Form::label("category_id", "Category:") }}
        <select class="form-control" name="category_id">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>

        {{ Form::label("tags", "Tags:") }}
        <select class="form-control select2-multi" name="tags[]" multiple>
          @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        </select>

        {{ Form::label("image", "Upload Image:") }}
        {{ Form::file("image") }}

        {{ Form::label("body", "Post Body:") }}
        {{ Form::textarea("body", "Write stuff here", array("class"=>"form-control")) }}

        {{ Form::submit("Create Post", array("class"=>"btn btn-success btn-lg btn-block")) }}
      {!! Form::close() !!}
    </div>
  </div>
@endsection

@section("scripts")
  {!! Html::script("js/Parsley.js") !!}
  {!! Html::script("js/select2.min.js") !!}
  <script>
    $(".select2-multi").select2();
  </script>
@endsection
