@extends('layouts.home') @section('content')
  <div class="home-slider">
    <div class="container-fluid">
      <div class="row">
        <div class="">
          <div class="home-slider-inner">
            <!-- Home image carousel -->
            <div class="owl-carousel" id="home-slider">
              <div class="image-item" style="background-image:url({{asset('images/home-slider-2.jpg')}})"></div>
              <div class="image-item" style="background-image:url({{asset('images/home-slider-1.jpg')}})"></div>
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

                      <div class="clearfix"></div>
                      <a class="btn btn-lg btn-default student register" data-toggle="modal" href='#student-modal-id'>
                        <span class="glyphicon glyphicon-user"></span>
                        Register</a>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="box-section text-left">
                      <h3>Register as a Student</h3>

                      <div class="clearfix"></div>
                      <a class="btn btn-lg btn-default company register" data-toggle="modal" href='#company-modal-id'>
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
  <div class="list-wrapper" id="about-us">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <ul class="circle-icons round-icon home-lists clearfix">
            <li class="clearfix">
              <a href="{{route('about_us')}}#how-it-works" class="list-s clearfix">
                <div class="main-t clearfix">
                  <div class="main-t-inner">
                    <div class="main-t-content">
                      How it Works
                    </div>
                  </div>
                </div>
              </a>
            </li>
            <li class="clearfix">
              <a href="{{route('about_us')}}#why-do-internships" class="list-s clearfix">
                <div class="main-t clearfix">
                  <div class="main-t-inner">
                    <div class="main-t-content">
                      Why do Internships
                    </div>
                  </div>
                </div>
              </a>
            </li>
            <li class="clearfix">
              <a href="{{route('about_us')}}#for-students" class="list-s clearfix">
                <div class="main-t clearfix">
                  <div class="main-t-inner">
                    <div class="main-t-content">
                      For Students
                    </div>
                  </div>
                </div>
              </a>
            </li>
            <li class="clearfix">
              <a href="{{route('about_us')}}#for-companies" class="list-s clearfix">
                <div class="main-t clearfix">
                  <div class="main-t-inner">
                    <div class="main-t-content">
                      For Companies
                    </div>
                  </div>
                </div>
              </a>
            </li>
            <li class="clearfix">
              <a href="{{route('about_us')}}#faqs" class="list-s clearfix">
                <div class="main-t clearfix">
                  <div class="main-t-inner">
                    <div class="main-t-content">
                      FAQs
                    </div>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- eof section : list classified and icons -->
  <div class="clearfix"></div>
@stop
@section('modals')
  <!-- Student Modal -->
  <div class="modal fade" id="student-modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('send_student_confirmation')}}" class="" id="student-register" method="POST">
          {{csrf_field()}}
          {{method_field('POST')}}
          <input type="hidden" value="0" name="type">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title">Student Register
            </h3>
          </div>
          <div class="modal-body">
            <div class="form-group"><label for="" class="control-label">Email Address</label><input type="email"
                                                                                                    required="required"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter your Email ID"
                                                                                                    name="email"></div>
            <div class="form-group"><label for="" class="control-label">Password</label><input type="password"
                                                                                               required="required"
                                                                                               class="form-control"
                                                                                               placeholder="Enter your Password"
                                                                                               name="password"></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- eof student modal -->
  <!-- Company Modal -->

  <div class="modal fade" id="company-modal-id">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('send_student_confirmation')}}" class="" id="company-register" method="POST">
          {{csrf_field()}}
          {{method_field('POST')}}
          <input type="hidden" value="1" name="type">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title">Register Company
            </h3>
          </div>
          <div class="modal-body">
            <div class="form-group"><label for="" class="control-label">Email Address</label><input type="email"
                                                                                                    required="required"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter your Email ID"
                                                                                                    name="email"></div>
            <div class="form-group"><label for="" class="control-label">Password</label><input type="password"
                                                                                               required="required"
                                                                                               class="form-control"
                                                                                               placeholder="Enter your Password"
                                                                                               name="password"></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- eof company modal -->
@stop 