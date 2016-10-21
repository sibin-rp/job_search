@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3>Internship Lists</h3>
    </div>
    <div class="internship-list-table">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Position</th>
            <th>Company</th>
            <th>Validity</th>
            <th>Location</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($internships as $internship)
            <tr>
              <td>
                <a href="{{route('internships_program.show',
                ['company_user'=>$user,'internship_program'=> $internship->iid])}}">

                  {{$internship->title}}
                </a>
              </td>
              <td>
                {{$internship->name}}
              </td>
              <td>
                {{$internship->validity}}
              </td>
              <td>
                {{$internship->address}}
              </td>
              <td>
                <form action="{{route('internships_program.destroy',
                ['user'=> $user,'internship_program'=> $internship->iid])}}" method="post">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <a href="{{route('internships_program.edit',['user'=>$user,'internship_program'=>$internship->iid])}}" class="btn btn-xs btn-primary">Edit</a>
                  <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop