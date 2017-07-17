<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Mail;

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

    public function PostContact(Request $request) {
      $this->validate($request, ['email'=>'required|email', 'message'=>'min:10', 'subject'=>'min:3']);

      $data = ['email'=>$request->email, 'subject'=>$request->subject, 'bodyMessage'=>$request->message];
      Mail::send('emails/contact', $data, function($message) use($data) {
        $message->from($data['email']);
        $message->to('Hugokuipers@hotmail.com');
        $message->subject('Contact form: '.$data['subject']);
      });

      Session::flash('succes', 'Your email has been send, you will be contacted as soon as humanly possible, probably...');

      return redirect()->route("welcome");
    }
}
