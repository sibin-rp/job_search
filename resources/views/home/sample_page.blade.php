@extends('layouts.home')
@section('extra_css')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
@stop
@section('content')
  <div class="sample-page">
    <div class="login-system">
      <a class="btn btn-primary" data-toggle="modal" href="#modal-id">Trigger modal</a>

      <div class="modal fade login-modal" id="modal-id">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <!-- TAB NAVIGATION -->
              <ul class="nav nav-tabs login-nav clearfix" role="tablist">
                <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Login</a></li>
                <li><a href="#tab2" role="tab" data-toggle="tab">Register</a></li>
              </ul>
              <!-- TAB CONTENT -->
              <div class="tab-content">
                <div class="active tab-pane fade in" id="tab1">
                  <form action="">
                    <div class="form-group"><label for="" class="control-label">Email</label><input type="email"
                                                                                                    placeholder="Email address"
                                                                                                    class="form-control"
                                                                                                    required="required">
                    </div>
                    <div class="form-group"><label for="" class="control-label">Password</label><input type="password"
                                                                                                       placeholder="Password"
                                                                                                       class="form-control"
                                                                                                       required="required">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-block btn-success">Login</button>
                    </div>
                  </form>
                  <div class="divider">

                  </div>
                  <ul class="c-social-media">
                    <li class="facebook"><a href=""><span class="fa fa-facebook"></span></a></li>
                    <li class="twitter"><a href=""><span class="fa fa-twitter"></span></a></li>
                    <li class="google"><a href=""><span class="fa fa-google-plus"></span></a></li>
                    <li class="linkedin"><a href=""><span class="fa fa-linkedin"></span></a></li>
                  </ul>
                </div>
                <div class="tab-pane fade" id="tab2">
                  <form action="">
                    <div class="form-group"><label for="" class="control-label">Name</label><input type="text"
                                                                                                   placeholder="Name"
                                                                                                   class="form-control"
                                                                                                   required="required">
                    </div>
                    <div class="form-group"><label for="" class="control-label">Email</label><input type="email"
                                                                                                    placeholder="Email address"
                                                                                                    class="form-control"
                                                                                                    required="required">
                    </div>
                    <div class="form-group"><label for="" class="control-label">Password</label><input type="password"
                                                                                                       placeholder="Password"
                                                                                                       class="form-control"
                                                                                                       required="required">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-block btn-success">Register</button>
                    </div>
                  </form>
                  <div class="divider">

                  </div>
                  <ul class="c-social-media">
                    <li class="facebook"><a href=""><span class="fa fa-facebook"></span></a></li>
                    <li class="twitter"><a href=""><span class="fa fa-twitter"></span></a></li>
                    <li class="google"><a href=""><span class="fa fa-google-plus"></span></a></li>
                    <li class="linkedin"><a href=""><span class="fa fa-linkedin"></span></a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>
  </div>
@stop