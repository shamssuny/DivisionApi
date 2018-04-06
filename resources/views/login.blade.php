@extends('template.master')

@section('title','Login')

@section('content')

    <div class="login-main">

        <div class="col-md-8 col-md-offset-2 text-center">

            <div class="panel panel-success">

                <div class="panel-heading"><h4>Login To Dashboard</h4></div>
                <div class="panel-body">
                    @if(session('create_success'))
                        <p class="alert alert-success">{{ session('create_success') }}</p>
                    @endif
                        @if(session('login_error'))
                            <p class="alert alert-warning">{{ session('login_error') }}</p>
                        @endif

                        @include('errors.error')
                    <form class="form-group form-inline" method="post" action="">
                        {{ csrf_field() }}
                        <input class="form-control" type="email" name="email" placeholder="Your Email"><br><br>
                        <input class="form-control" type="password" name="password" placeholder="Your Password"><br><br>
                        <input class="btn btn-success" type="submit" name="submit" value="Login">

                    </form>
                </div>

            </div>

        </div>

    </div>

@endsection