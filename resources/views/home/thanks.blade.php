@extends('layouts.home')
@section('content')
    <div class="thankspage">
        <div class="jumbotron ">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="text-center">Thanks for Registration!</h2>


                        <div class="text-center">
                            <span class="glyphicon glyphicon-ok-sign gp" ></span>
                        </div>
                        <br>

                        <div class="text-center"><a class="btn btn-success btn-lg" data-toggle="modal" href="#myModal">
                                login</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('modals')
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group"><label for="" class="control-label">Email Address</label><input type="email"
                                                                                                            required="required"
                                                                                                            class="form-control"
                                                                                                            placeholder="Enter your Email ID"
                                                                                                            name="email">
                    </div>
                    <div class="form-group"><label for="" class="control-label">Name</label><input type="text"
                                                                                                   required="required"
                                                                                                   class="form-control"
                                                                                                   placeholder="Enter your Name"
                                                                                                   name="text"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">login</button>
                </div>
            </div>
        </div>
    </div>
@stop



