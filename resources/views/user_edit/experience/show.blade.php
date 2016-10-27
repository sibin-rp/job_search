@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4 class="clearfix">
        {{$experience->company_name or $experience->title}}
        <small class="pull-right">
          <a href="{{route('experience.edit',['user'=> $user,'experience'=> $experience])}}" class="btn btn-xs btn-primary">
            <span class="glyphicon glyphicon-edit"></span>
          </a>
        </small>
      </h4>
    </div>
    <div class="form-section">
      <table class="table table-bordered">
        @if(in_array($experience->experience_type,['job','internship']))
        <!-- Job and Internship -->
        <tr>
          <td>Company Name</td>
          <td>{{$experience->company_name}}</td>
        </tr>
        <tr>
          <td>Internship field</td>
          <td>{{ $experience->internship_field->name }}</td>
        </tr>
        <tr>
          <td>Started </td>
          <td>{{$experience->work_from}}</td>
        </tr>
        <tr>
          <td>Ended</td>
          <td>{{$experience->work_to}}</td>
        </tr>
        <tr>
          <td>Stipend Received</td>
          <td>{{(isset($experience->stipend) && $experience->stipend) ? 'Yes':'No'}}</td>
        </tr>
        <tr>
          <td>Job Description</td>
          <td>{{$experience->job_description}}</td>
        </tr>
        <!-- end job and internship -->
        @else
        <!-- project/freelance/training/other -->
        <tr>
          <td>Experience Type</td>
          <td>{{$experience->experience_type_name}}</td>
        </tr>
        <tr>
          <td>Title</td>
          <td>{{$experience->title}}</td>
        </tr>
        <tr>
          <td>Description</td>
          <td>{{$experience->job_description}}</td>
        </tr>
        <tr>
          <td>Link</td>
          <td>{{$experience->link}}</td>
        </tr>
        <tr>
          <td>Organization</td>
          <td>{{$experience->organization}}</td>
        </tr>
        <tr>
          <td>Location</td>
          <td>{{$experience->location}}</td>
        </tr>
        <!-- end project/freelance/training/other -->
        @endif
      </table>
    </div>
  </div>
@stop