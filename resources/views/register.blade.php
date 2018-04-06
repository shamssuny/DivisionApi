@extends('template.master')

@section('title','Registration')

@section('content')
    
    <div class="registration-main text-center">
        
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-success">
                
                <div class="panel-heading"><h4>Register</h4></div>
                <div class="panel-body">

                    @include('errors.error')

                    <form method="post" action="" class="form-group form-inline">
                        {{ csrf_field() }}
                        <input class="form-control" type="text" name="name" placeholder="Your Name"><br><br>
                        <input class="form-control" type="email" name="email" placeholder="Your Email"><br><br>
                        <input class="form-control" type="password" name="password" placeholder="Your Password"><br><br>
                        <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"><br><br>
                        <input class="btn btn-success" type="submit" name="submit" value="Register"><br><br>
                    </form>
                    
                </div>
            </div>
            
        </div>
        
    </div>
    
@endsection    