@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3>
        {{$company->name}}
        <small class="pull-right">
          <a href="{{route('company.edit',['company'=> $company])}}" class="btn btn-sm btn-primary">
            <span class="fa fa-edit"></span>
            Edit
          </a>
        </small>
      </h3>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <table class="table">
          <tr>
            <td>Website</td>
            <td>{{$company->name}}</td>
          </tr>
          <tr>
            <td>Phone</td>
            <td>{{$company->phone}}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{$company->email}}</td>
          </tr>
          <tr>
            <td>Address</td>
            <td>{{$company->address}}</td>
          </tr>
          <tr>
            <td>Industry</td>
            <td>{{$company->industry_type}}</td>
          </tr>
          <tr>
            <td>Linkedin ID</td>
            <td>{{$company->linkedin_id}}</td>
          </tr>
          <tr>
            <td>Organization Type</td>
            <td>{{$company->organization_type_name}}</td>
          </tr>
          <tr>
            <td>City</td>
            <td>{{$company->city}}</td>
          </tr>
          <tr>
            <td>State</td>
            <td>{{$company->state_name}}</td>
          </tr>
        </table>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="company-logo">
          <img src="http://placehold.it/640/640" alt="{{$company->name}}" class="img-responsive img-rounded">
        </div>
      </div>
    </div>
  </div>

@stop