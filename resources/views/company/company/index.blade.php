@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="companies-list">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Company</th>
              <th>Website</th>
              <th>Contact</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($companies as $company)
              <tr>
                <td>{{$loop->index}}</td>
                <td>
                  <a href="{{route('company.show',['company'=>$company])}}">{{$company->name}}</a>
                </td>
                <td>
                  <a href="{{$company->website}}" target="_blank">{{$company->website}}</a>
                </td>
                <td>
                  {{$company->phone}}
                </td>
                <td>
                  <form action="{{route('company.destroy',['company'=> $company])}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <a href="" class="btn btn-xs btn-primary">Edit</a>
                    <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop