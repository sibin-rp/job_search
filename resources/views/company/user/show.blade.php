@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4>
        {{$user->name}}
        <small class="pull-right">
          <a href="{{route('company_user.edit',['user'=> $user])}}" class="btn btn-sm btn-primary">
            <span class="glyphicon glyphicon-edit"></span>Profile</a>
        </small>
      </h4>
    </div>
    <table class="table table-bordered">
      <tbody>
        <tr>
          <td>First Name</td>
          <td>{{$user->first_name}}</td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>{{$user->last_name}}</td>
        </tr>
        <tr>
          <td>Gender</td>
          <td>{{$user->sex}}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>{{$user->email}}</td>
        </tr>
        <tr>
          <td>Phone</td>
          <td>{{$user->phone_no}}</td>
        </tr>
        <tr>
          <td>Date Of Birth</td>
          <td>{{$user->dob}}</td>
        </tr>
        <tr>
          <td>City</td>
          <td>{{$user->home_city}}</td>
        </tr>
        <tr>
          <td>Address</td>
          <td>{{$user->home_address}}</td>
        </tr>
        <tr>
          <td>State</td>
          <td>{{$user->home_state_name}}</td>
        </tr>
        <tr>
          <td>Company</td>
          <td>{{$user->company->name}}</td>
        </tr>
        <tr>
          <td>Position</td>
          <td>{{$user->role}}</td>
        </tr>
        <tr>
          <td>Live City</td>
          <td>{{$user->live_city}}</td>
        </tr>

        <tr>
          <td>Live Address</td>
          <td>{{$user->live_address}}</td>
        </tr>
        <tr>
          <td>Live State</td>
          <td>{{$user->live_state_name}}</td>
        </tr>
        <tr>
          <td>Alternate Email</td>
          <td>{{$user->alternate_email}}</td>
        </tr>
        <tr>
          <td>Alternate Contacts</td>
          <td>{{$user->alternate_contact}}</td>
        </tr>
      </tbody>
    </table>
    @if($user->describe && trim($user->describe)!="")
    <h4>About me</h4>
    <div class="well">
      {!! $user->describe !!}
    </div>
    @endif
  </div>
@stop