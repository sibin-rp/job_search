@extends('layouts.home')
@section('content')
  <div class="intern_wrapper">
  <div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-4 col-lg-3">
    @include('home._vertical_search_form')
  </div>
  <div class="col-xs-12 col-sm-8 col-lg-9">
    <div class="internship-lists">
      @foreach($internships as $internship)
        <div class="internship-item">
          <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-lg-offset-3 col-sm-9 col-lg-9">
              <h3>{{$internship->title}}</h3>
              <h5> in <label for="">{{$internship->company->name}}</label> @ <label for="">{{$internship->city}}</label></h5>
              <div class="divider"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-3 col-lg-3">
              <img src="@if($internship->company->logo) {{$internship->company->logo}} @else {{asset('images/placeholder-company.png')}}@endif" alt="" class="img-responsive">
            </div>
            <div class="col-xs-12 col-sm-9 col-lg-9">
              <article>
                {!! $internship->description !!}
              </article>
              <div class="more-details clearfix">
                <p class="pull-left">
                  Stipend: <label for="">Rs:{{$internship->stipend_from}}</label>
                  - <label for="">Rs:{{$internship->stipend_to}}</label>
                </p>
                <p class="pull-left">
                  Age : <label for="">{{$internship->eligible_min}}</label> - <label for="">{{$internship->eligible_max}}</label>
                </p>
              </div>
              <div class="more-link text-right clearfix">
                <p class="pull-left">
                  Internship Expire on
                  <label for="">{{$internship->validity}}</label>
                </p>
                <a href="{{route('show_internship',$internship->id)}}" class="btn btn-success btn-sm pull-right">
                  <span class="glyphicon glyphicon-link"></span>
                  View More
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>



  </div>
  </div>
  </div>
@stop