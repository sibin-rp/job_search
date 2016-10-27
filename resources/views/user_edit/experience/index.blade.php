@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3 class="title">
        Experience List
        <small class="pull-right">
          <a href="{{route('experience.create',['user'=> $user])}}" class="btn btn-sm btn-primary">
              <span class="glyphicon glyphicon-plus"></span>Add
          </a>
        </small>
      </h3>
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
        @if($experience->count() > 0)
        @foreach($experience as $exp)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title clearfix">
                <a data-toggle="collapse" data-parent="#exp-accordion" href="#exp-collapse-{{$loop->index}}">
                  {{$exp->company_name or $exp->title}}
                </a>
                <small class="">
                  <a href="{{route('experience.edit',[
                    'user'=> $user,'experience'=> $exp
                    ])}}">
                    <span class="glyphicon glyphicon-edit"></span></a>
                </small>
                @if(in_array($exp->experience_type,['job','internship']))
                  <small class="pull-right">
                    <span class="badge">{{$exp->work_from}}</span>
                    <i>to</i>
                    <span class="badge">{{$exp->work_to}}</span>
                  </small>

                @endif
              </h3>
            </div>
            <div class="panel-collapse collapse @if($loop->index == 0) in @endif" id="exp-collapse-{{$loop->index}}">
              <div class="panel-body">
                @php
                  $main_ex_array = ['internship','job'];
                @endphp
                @if(in_array($exp->experience_type, $main_ex_array))
                <!-- Job/Internship -->
                <table class="table table-bordered">
                  <tbody>
                  <tr>
                    <td>Company Name</td>
                    <td>{{$exp->company_name or 'Not available'}}</td>
                  </tr>
                  <tr>
                    <td>Job Type</td>
                    <td>{{$exp->work_type}}</td>
                  </tr>
                  <tr>
                    <td>Domain</td>
                    <td>{{$exp->internship_field->name or 'Unknown'}}</td>
                  </tr>
                  <tr>
                    <td>Work Started on</td>
                    <td>{{$exp->work_from or 'Not available'}}</td>
                  </tr>
                  <tr>
                    <td>Left on</td>
                    <td>{{$exp->work_to or 'Not available'}}</td>
                  </tr>
                  </tbody>
                </table>
                <!-- end job/internship -->
                @else
                  <!-- Project/Freelance/Training/Other -->
                  <table class="table table-bordered">
                    <tbody>
                    <tr>
                      <td>Experience Type</td>
                      <td>{{$exp->experience_type}}</td>
                    </tr>
                    <tr>
                      <td>Title</td>
                      <td>{{$exp->title}}</td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td>{{$exp->job_description}}</td>
                    </tr>
                    <tr>
                      <td>Organization</td>
                      <td>{{$exp->organization}}</td>
                    </tr>
                    <tr>
                      <td>Location</td>
                      <td>{{$exp->location}}</td>
                    </tr>
                    </tbody>
                  </table>
                  <!-- end project/freelance/training/other -->
                @endif 
              </div>
            </div>
          </div>
        @endforeach
          @else
          <div class="well">
            We don't find anything...
          </div>
        @endif
      </div>
    @endif 
  </div>
@stop