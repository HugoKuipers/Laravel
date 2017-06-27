<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PagesController extends Controller {
    public function getIndex() {
      $posts = Post::orderBy("updated_at", "desc")->limit(4)->get();
      return view("pages/welcome")->withPosts($posts);
    }
    public function getAbout() {
      $first = "Hugo";
      $last = "Kuipers";
      $fullname = $first." ".$last;
      $email = "Hugokuipers@hotmail.com";
      $data = [];
      $data["fullname"] = $fullname;
      $data["email"] = $email;
      return view("pages/about")->withData($data);
    }
    public function getContact() {
      return view("pages/contact");
    }
}
