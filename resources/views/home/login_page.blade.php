@extends('layouts.home')
@section('content')
    <div class="loginp">
        <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
            <h2>Please fill the details</h2>
            <form data-parsley-validate="" method="post" action="{{route('post_login')}}" id="hello-one">
                {{csrf_field()}}
                {{method_field('POST')}}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="" data-parsley-error-message="Email address is required">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required="" data-parsley-error-message="Password is required">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <div class="text-right">
                <button type="submit" class="btn btn-success">Submit</button>
                    </div>
            </form>
        </div>
                <div class="col-md-4"></div>
    </div>
    </div>
    </div>
    </div>

@stop
