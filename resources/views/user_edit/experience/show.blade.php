@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4>{{$experience->company_name or $experience->title}}</h4>
    </div>
    <div class="form-section">
      <table class="table table-bordered">
        <tr>
          <td>Company Name</td>
          <td>{{$experience->company_name}}</td>
        </tr>
        <tr>
          <td>Internship field</td>
          <td>{{ $experience->internship_field_id }}</td>
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
          <td>{{$experience->stipend}}</td>
        </tr>
        <tr>
          <td>Job Description</td>
          <td>{{$experience->job_description}}</td>
        </tr>
      </table>
    </div>
  </div>
@stop