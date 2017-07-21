<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{

    public function __construct()
    {
      $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("id", "desc")->paginate(10);
        return view("posts/index")->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("posts/create")->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array("title"=>"required|max:255", "slug"=>"required|max:255|min:5|unique:posts,slug|alpha_dash", "body"=>"required", "category_id"=>"required", 'image'=>'sometimes|image'));

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        if($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('images/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);
          $post->image = $filename;
        }

        $post->save();

        if(isset($request->tags)) {
          $post->tags()->sync($request->tags, false);
        }
        else {
          $post->tags()->sync([], false);
        }

        Session::flash("succes", "The post was succesfully saved!");

        return redirect()->route("posts.show", $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view("posts/show")->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();
        $cats = [];
        foreach($categories as $category) {
          $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tatas = [];
        foreach($tags as $tag) {
          $tatas[$tag->id] = $tag->name;
        }

        return view("posts/edit")->withPost($post)->withCategories($cats)->withTags($tatas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, ["title"=>"required|max:255", "slug"=>"required|max:255|min:5|unique:posts,slug,$id|alpha_dash", "body"=>"required", "category_id"=>"required", 'image'=>'sometimes|image']);

      $post = Post::find($id);
      $post->title = $request->input("title");
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = Purifier::clean($request->input("body"));

      if($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);
        $oldFilename = $post->image;
        $post->image = $filename;
        Storage::delete($oldFilename);
      }

      $post->save();

      if(isset($request->tags)) {
        $post->tags()->sync($request->tags);
      }
      else {
        $post->tags()->sync([]);
      }

      Session::flash("succes", "The post was succesfully updated!");

      return redirect()->route("posts.show", $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);

        Post::destroy($id);

        Session::flash("succes", "The post was succesfully deleted!");

        return redirect()->route("posts.index");
    }
}
