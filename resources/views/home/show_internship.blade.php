@extends('layouts.home')
@section('content')
  <div class="intern_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-4 col-lg-3">
          @include('home._vertical_search_form')
        </div>
        <div class="col-xs-12 col-sm-8 col-lg-9">
          <div class="internship-lists padding-l-15">
            <div class="page-header">
              <h1>{{$internship->title}}</h1>
            </div>
            <p>
              Posted at {{$internship->created_at}}
            </p>
            <section class="well">
              {!! $internship->description !!}
            </section>
            <h4>More Information</h4>
            <hr>
            <div class="responsive-table">
              <table class="table table-bordered">
                <tr>
                  <td rowspan="2">
                    Stipend
                  </td>
                  <td>from</td>
                  <td>Rs: {{$internship->stipend_from}}</td>
                </tr>
                <tr>
                  <td>to</td>
                  <td>Rs: {{$internship->stipend_to}}</td>
                </tr>
                <tr>
                  <td rowspan="2">Eligibility</td>
                  <td>Minimum age</td>
                  <td>{{$internship->eligible_min}} year</td>
                </tr>
                <tr>
                  <td>Maximum age</td>
                  <td>{{$internship->eligible_max}} year</td>
                </tr>
                <tr>
                  <td>Duration</td>
                  <td colspan="2">
                    {{ $internship->duration_type  }}
                  </td>
                </tr>
                <tr>
                  <td>Work Type</td>
                  <td colspan="2">{{$internship->work_type_option}}</td>
                </tr>
                <tr>
                  <td>Internship On</td>
                  <td colspan="2">
                    {{$internship->internship_field->name}}
                  </td>
                </tr>
                <tr>
                  <td>Payment</td>
                  <td colspan="2">
                    {{$internship->payment_detail}}
                  </td>
                </tr>
                <tr>
                  <td>Internship Validity</td>
                  <td colspan="2">
                    {{$internship->validity}}
                  </td>
                </tr>
                <tr>
                  <td>Internship Prerequisites</td>
                  <td colspan="2">
                    {{ucwords(str_replace("_","",$internship->pre_rec_exercise))}}
                  </td>
                </tr>
              </table>
            </div>
            <div class="well">
              <h4>Location</h4>
              <hr>
              <div class="location-info">
                <p>
                  @if(isset($internship->company->name) && $internship->company->name!="") {{$internship->company->name}}, @endif
                  @if(isset($internship->city) && $internship->city!="") {{$internship->city}}, @endif
                  @if(isset($internship->state)) {{$internship->state_name}}@endif
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@stop