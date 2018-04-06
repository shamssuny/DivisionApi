@extends('template.master')

@section('title','Dashboard')

@section('content')

    <div class="dashboard-main">

        <div class="col-md-8 col-md-offset-2 text-center">

            <div class="panel panel-success">
                <div class="panel-heading"><h3>Dashboard</h3></div>
                <div class="panel-body">

                    @if(session('token_delete'))
                        <p class="alert alert-success">{{ session('token_delete') }}</p>
                    @endif

                        @if(session('token_success'))
                            <p class="alert alert-success">{{ session('token_success') }}</p>
                        @endif

                    <h3>Generate Token To Get Access</h3>
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <input type="submit" name="submit" value="Generate Token" class="btn btn-success">
                    </form>


                    <table class="table table-striped" style="word-break: break-all;">
                        <thead>
                        <tr>
                            <th>Token</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($tokens as $token)
                        <tr>
                            <td>{{ $token }}</td>
                            <td><a class="btn btn-danger btn-sm" href="{{ url('/dashboard/'.$token.'/delete') }}">Delete</a></td>
                        </tr>
                        @empty
                            <p>No Tokens!</p>
                        @endforelse
                        </tbody>
                    </table>


                </div>
            </div>

        </div>

    </div>

@endsection