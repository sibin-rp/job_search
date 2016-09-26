@extends('layouts.user')
@section('content')


  <div class="container ">
    <div class="row">

      <div class="col-sm-4 col-md-4 col-lg-3">
        @if($user->profile_path)
        <img class="img-responsive im" src="images/im.jpg">
        @else
          <img src="http://placehold.it/320" alt="" class="img-responsive img-round">
        @endif
      </div>
      <div class="col-sm-8 col-md-8 col-lg-9">
        <h2>Personal profile</h2>
        <div class="table-responsive">
          <table class="table">
            <tbody>
            <tr>
              <td>Name</td>
              <td>{{$user->name}}</td>
            </tr>
            <tr>
              <td>Username</td>
              <td>{{$user->username}}</td>
            </tr>
            <tr>
              <td>Age/Date</td>
              <td></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td>{{$user->gender}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>
                {{$user->email}}
                <br>
                @if($user->alternate_email)
                {{$user->alternate_email}} (alternate email)
                @endif
              </td>
            </tr>
            <tr>
              <td>Contact</td>
              <td>{{$user->phone}}
                <br>
                @if($user->alternate_contact)
                  {{$user->alternate_contact}}
                @endif
              </td>
            </tr>
            <tr>
              <td>Address</td>
              <td>
                {{$user->home_address}}
                <br>
                {{$user->home_state_name}}
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        
      </div>


    </div>
  </div>







@stop