@extends('layouts.home')
@section('content')
  <div class="about-us-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="about-us">
            <div class="page-header">
              <h1>About Us and Why we are here</h1>
            </div>
            <div class="about-us-content">
              <div class="section-c" id="how-it-works">
                <h3 class="title"># How it Works</h3>
                @include('home.about_us._how_it_works')
              </div>
              <div class="section-c" id="why-do-internships">
                <h3 class="title"># Why  Internships</h3>
                @include('home.about_us._why_internship')
              </div>
              <div class="section-c" id="for-students">
                <h3 class="title"># For Students</h3>
                @include('home.about_us._for_students')
              </div>
              <div class="section-c" id="for-companies">
                <h3 class="title"># For Companies</h3>
                @include('home.about_us._for_companies')
              </div>
              <div class="section-c" id="faqs">
                <h3 class="title"># FAQs</h3>
                @include('home.about_us._faqs')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop