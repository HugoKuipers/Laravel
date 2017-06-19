@extends("main")

@section("activeHome", "active")
@section("content")
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Welcome to My Blog!</h1>
        <p class="lead">Thank you for visiting, this is a test site to practice Laravel. Please read the popular post!</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="post">
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
        <a href="#" class="btn btn-primary">Continue Reading</a>
      </div>
      <hr>
      <div class="post">
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
        <a href="#" class="btn btn-primary">Continue Reading</a>
      </div>
      <hr>
      <div class="post">
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
        <a href="#" class="btn btn-primary">Continue Reading</a>
      </div>
      <hr>
      <div class="post">
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
        <a href="#" class="btn btn-primary">Continue Reading</a>
      </div>
    </div>
    <div class="col-md-3 col-md-offset-1">
      <h2>Sidebar</h2>
    </div>
  </div>
@endsection
