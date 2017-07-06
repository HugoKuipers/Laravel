@extends('main')

@section("title", "- Forgot Password")
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    {!! Form::open(["url"=>"password/reset", "method"=>"POST"]) !!}

                    {{ Form::hidden("token", $token) }}

                    {{ Form::label("email", "Email address:") }}
                    {{ Form::email("email", $email, ["class"=>"form-control"]) }}

                    {{ Form::label("password", "New Password:") }}
                    {{ Form::password("password", ["class"=>"form-control"]) }}
                    {{ Form::label("passwordConfirmation", "Confirm Password:") }}
                    {{ Form::password("passwordConfirmation", ["class"=>"form-control"]) }}

                    {{ Form::submit("Reset Password", ["class"=>"btn btn-primary center-block btn-h1-spacing"]) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
