@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3 class="title">Experience List</h3>
    </div>
    @if($experience==null)
    <ul>
      <li><a href="{{route('experience.index',['user'=>$user,'exp_type'=>'job'])}}"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;Jobs</a></li>
      <li><a href="{{route('experience.index',['user'=>$user,'exp_type'=>'internship'])}}"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;Internships</a></li>
      <li><a href="{{route('experience.index',['user'=>$user,'exp_type'=>'project'])}}"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;Projects</a></li>
      <li><a href="{{route('experience.index',['user'=>$user,'exp_type'=>'training'])}}"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;Freelance</a></li>
      <li><a href="{{route('experience.index',['user'=>$user,'exp_type'=>'freelance'])}}"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;Training</a></li>
      <li><a href="{{route('experience.index',['user'=>$user,'exp_type'=>'other'])}}"><span class="glyphicon glyphicon-bookmark"></span>&nbsp;Others</a></li>
    </ul>
    @else
      <div class="panel-group" id="exp-accordion" aria-multiselectable="true">
        @foreach($experience as $exp)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                <a data-toggle="collapse" data-parent="#exp-accordion" href="#exp-collapse-{{$loop->index}}">
                  {{$exp->company_name}}
                  <small class="pull-right">
                    <span class="badge">{{$exp->work_from}}</span>
                    <i>to</i>
                    <span class="badge">{{$exp->work_to}}</span>
                  </small>
                </a>
              </h3>
            </div>
            <div class="panel-collapse collapse @if($loop->index == 0) in @endif" id="exp-collapse-{{$loop->index}}">
              <div class="panel-body">
                <table class="table table-bordered">
                  <tbody>
                  <tr>
                    <td>Company Name</td>
                    <td>{{$exp->company_name}}</td>
                  </tr>
                  <tr>
                    <td>Job Type</td>
                    <td>{{$exp->work_type}}</td>
                  </tr>
                  <tr>
                    <td>Domain</td>
                    <td>{{$exp->internship_field->name}}</td>
                  </tr>
                  <tr>
                    <td>Work Started on</td>
                    <td>{{$exp->work_from}}</td>
                  </tr>
                  <tr>
                    <td>Left on</td>
                    <td>{{$exp->work_to}}</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif 
  </div>
@stop