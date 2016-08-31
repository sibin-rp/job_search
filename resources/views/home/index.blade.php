@extends('layouts.home') @section('content')
<div class="home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="">
            <div class="home-slider-inner">
                <!-- Home image carousel -->
                <div class="owl-carousel" id="home-slider">
                    <div class="image-item" style="background-image:url({{asset('images/home-slider-1.jpg')}})"></div>
                    <div class="image-item" style="background-image:url({{asset('images/home-slider-2.jpg')}})"></div>
                    <div class="image-item" style="background-image:url({{asset('images/home-slider-3.jpg')}})"></div>
                </div>
                <!-- eof home image carousel -->
                <!-- Home information -->
                <div class="home-content-section hidden">
                    <div class="content-section">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                        <div class="box-section text-right">
                            <h3>Register as a Student</h3>
                            <section>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur molestie lacinia pulvinar. In sed neque ornare, convallis mi a, vehicula eros.</section>
                            <div class="clearfix"></div>
                            <a class="btn btn-lg btn-default student register" data-toggle="modal" href='#modal-id'>
                            <span class="glyphicon glyphicon-user"></span>
                            Register</a>       
                        </div>    
                        </div>
                        <div class="col-xs-12 col-sm-6">
                        <div class="box-section text-left">
                            <h3>Register as a Student</h3>
                            <section>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur molestie lacinia pulvinar. In sed neque ornare, convallis mi a, vehicula eros.</section>
                            <div class="clearfix"></div>
                            <a  class="btn btn-lg btn-default company register" data-toggle="modal" href='#modal-id'>
                            <span class="glyphicon glyphicon-blackboard"></span>
                            Register</a>       
                        </div>    
                        </div>
                    </div>
                    </div>
                </div>
                <!-- eof home information -->
            </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- Section : List Classified and Icons -->
<div class="list-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">List</div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item">Items 1</li>
                                    <li class="list-group-item">Items 2</li>
                                    <li class="list-group-item">Items 3</li>
                                    <li class="list-group-item">Items 4</li>
                                    <li class="list-group-item">Items 5</li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                                        <div class="panel panel-default">
                        <div class="panel-heading">List</div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">Items 1</li>
                                <li class="list-group-item">Items 2</li>
                                <li class="list-group-item">Items 3</li>
                                <li class="list-group-item">Items 4</li>
                                <li class="list-group-item">Items 5</li>
                            </ul> 
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
            <ul class="circle-icons">
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
            </ul>
            </div>
        </div>
    </div>
</div>
<!-- eof section : list classified and icons -->
<div class="clearfix"></div>
@stop
@section('modals')

<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Register
                </h3>
            </div>
            <div class="modal-body">
                <div class="form-group"><label for="" class="control-label">Email Address</label><input type="text" class="form-control" placeholder="Enter your Email ID"></div>
                <div class="form-group"><label for="" class="control-label">Password</label><input type="text" class="form-control" placeholder="Enter your Password"></div>
        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Register</button>
            </div>
        </div>
    </div>
</div>

@stop 