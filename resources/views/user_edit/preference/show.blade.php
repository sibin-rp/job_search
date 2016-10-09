@extends('layouts.user')
@section('content')

      <div class="col-xs-12 col-sm-8">
        <div class="page-header">
          <h2>
            <small>
              Internship Preference >>
            </small> {{$preference->internship_field->name}}
          </h2>
        </div>
        <table class="table table-bordered">
          <thead>
          <tr>
            <td colspan="2" class="clearfix">
              <h4 class="pull-left">{{$preference->internship_field->name}}</h4>
              <form class="pull-right" action="{{route('preference.destroy',['user'=> $user,'preference'=> $preference])}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <a href="{{route('preference.edit',['user'=> $user,'preference'=> $preference])}}" class="btn btn-primary btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>Type of Company</td>
            <td>{{$preference->company_type_name}}</td>
          </tr>
          <tr>
            <td>
              Location
            </td>
            <td>
              {{$preference->city}}
            </td>
          </tr>
          <tr>
            <td>Duration</td>
            <td>{{$preference->duration_type}}</td>
          </tr>
          <tr>
            <td>Work Type</td>
            <td>{{$preference->work_type_option}}</td>
          </tr>
          <tr>
            <td>Stipend</td>
            <td>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Starting</td>
                    <td>Maximum</td>
                  </tr>
                  <tr>
                    <td>{{$preference->stipend_from}}</td>
                    <td>{{$preference->stipend_to}}</td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
          <tr>
            <td>Availability</td>
            <td>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>From</td>
                    <td>To</td>
                  </tr>
                  <tr>
                    <td>{{$preference->from_date}}</td>
                    <td>{{$preference->to_date}}</td>
                  </tr>
                </tbody>
              </table>  
            </td>
          </tr>
          <tr>
            <td>Skills</td>
            <td>
              <ul class="list-group">
              @foreach($preference->skills()->get() as $skill)
                <li class="list-group-item">
                  <div>
                    {{$skill->name}}
                    <div class="pull-right">
                      <label for="" class="badge">
                        {{ucwords($skill->pivot->expertise)}}
                      </label>
                    </div>
                  </div>
                </li>
              @endforeach
              </ul>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
  </div>
  </div>


@stop