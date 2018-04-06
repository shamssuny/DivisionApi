@extends('template.master')

@section('title','Welcome To Bangla API')


@section('content')

    <div class="docs-main">

        <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-success">

            <div class="panel-heading"><h4>Welcome to Divison Api Documentation</h4></div>
            <div class="panel-body">
                <h3>About Division Api</h3>
                <p>This Api will provide all the division list with their districts and upazilas of Bangladesh. Just register yourself and get token , then you are ready to go.</p>
                <small>Author: Shams Shahriar Suny</small>
                <hr>
                <h3>How to use ?</h3>
                <h4>Register</h4>
                <p>At first make yourself register into the system. Then from dashboard, generate your access token, to get access of this api.</p>
                <hr>
                <h4 class="alert alert-success">Api Instruction</h4>
                <p>Follow these following url pattern:</p>
                <b>Get All of the Division , District and Upazila data: </b>
                <p>{this site url}/api/alldata/{your token}</p>
                <br>
                <b>Get the list of divisions:</b>
                <p>{this site url}/divisionlist/{your token}</p>
                <br>
                <b>Get all the district list of the division:</b>
                <p>{this site url}/api/division/{division name}/{your token}</p>
                <br>
                <b>Get all upazila list of the district</b>
                <p>{this site url}/api/district/{district name}/{your token}</p>
            </div>

        </div>

        </div>

    </div>

@endsection