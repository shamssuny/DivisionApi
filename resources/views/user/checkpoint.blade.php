@extends('template.master')

@section('title','Check Point')

@section('content')

    <div class="check-main">

        <div class="col-md-6 col-md-offset-3 text-center">

            <div class="panel panel-success">

                <div class="panel-heading"><h3>Put Your Approve Code</h3></div>

                <div class="panel-body">
                    @include('errors.error')
                    @if(session('code_error'))
                        <p class="alert alert-warning">{{ session('code_error') }}</p>
                    @endif
                    <br>
                    <form action="" class="form-group form-inline" method="post">
                        {{ csrf_field() }}
                        <input class="form-control" type="number" name="code" placeholder="Approve Code"><br><br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                    </form>
                    <a href="{{ url('checkpoint/'.Auth::id().'/resend') }}">Resend Code</a>
                </div>

            </div>

        </div>

    </div>

@endsection