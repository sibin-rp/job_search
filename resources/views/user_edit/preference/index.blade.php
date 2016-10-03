@extends('layouts.user')
@section('content')
  <div class="container ">
  <div class="row">
    @include('user_partial._sidebar')
    <div class="col-xs-12 col-sm-8">
      <div class="page-header">
        <h3>
          Internship preferences
          <a href="{{route('preference.create',['user'=> $user])}}" class="pull-right btn btn-md btn-success">Add Preference</a>
        </h3>
      </div>
      @foreach($preferences->get() as $preference)
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            {{$preference->internship_field->name}}
            <form action="{{route('preference.destroy',['user'=> $user,'preference'=> $preference])}}" class="pull-right" method="post">
              {{csrf_field()}}
              {{method_field("DELETE")}}
              <a href="{{route('preference.show',['user'=>$user,'preference' => $preference])}}" class="btn btn-sm btn-success">View</a>
              <a href="{{route('preference.edit',['user'=> $user, 'preference' => $preference])}}" class="btn btn-sm btn-primary">Edit</a>
              <button class="btn btn-sm btn-danger" type="submit">Delete</button>
            </form>
          </h4>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <tbody>
            <tr>
              <td>Company Type</td>
              <td>{{$preference->company_type}}</td>
            </tr>
            <tr>
              <td>Duration</td>
              <td>{{$preference->duration}}</td>
            </tr>
            <tr>
              <td>City</td>
              <td>{{$preference->city}}</td>
            </tr>
            <tr>
              <td>Availability</td>
              <td>
                @if($preference->from_date || $preference->to_date)
                <table class="table table-stripped">
                  <tbody>
                  <tr>
                    <td>Available From</td>
                    <td>Available To</td>
                  </tr>
                  <tr>
                    <td>{{$preference->from_date}}</td>
                    <td>{{$preference->to_date}}</td>
                  </tr>
                  </tbody>
                </table>
                @endif
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  </div>

@stop