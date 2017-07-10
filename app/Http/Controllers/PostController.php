<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

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
        $this->validate($request, array("title"=>"required|max:255", "slug"=>"required|max:255|min:5|unique:posts,slug|alpha_dash", "body"=>"required", "category_id"=>"required"));

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();

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

        return view("posts/edit")->withPost($post)->withCategories($cats);
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
      $post = Post::find($id);
      $post->slug = "placeholder______superSpecialAwesomeAndUnique";
      $post->save();

      $this->validate($request, array("title"=>"required|max:255", "slug"=>"required|max:255|min:5|unique:posts,slug|alpha_dash", "body"=>"required", "category_id"=>"required"));

      $post->title = $request->input("title");
      $post->slug = $request->slug;
      $post->category_id = $request->category_id;
      $post->body = $request->input("body");
      $post->save();

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
        Post::destroy($id);

        Session::flash("succes", "The post was succesfully deleted!");

        return redirect()->route("posts.index");
    }
}
