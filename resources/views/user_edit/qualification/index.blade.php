@extends('layouts.user')
@section('content')
  @php
    $general_options = ['10_th','12_th','graduation','post_graduation','diploma','phd'];
    $available_options = [];
  @endphp

  <div class="container ">
    <div class="row">
      @include('user_partial._sidebar')
      <div class="col-xs-12 col-sm-8">
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Qualification</a></li>
          <li><a href="#tab2" role="tab" data-toggle="tab">Add new Qualification</a></li>
          <li><a href="#tab3" role="tab" data-toggle="tab">Academic/Sports/Arts</a></li>
        </ul>
        <!-- TAB CONTENT -->
        <div class="tab-content">
          <div class="active tab-pane fade in" id="tab1">
            @if($qualifications->count() > 0)
              @foreach($qualifications->get() as $qualification)
                @php
                  array_push($available_options,$qualification->type);
                @endphp
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$user->type}}" aria-expanded="true" aria-controls="collapseOne">
                          {{$qualification->qualification_type}}
                        </a>
                        <form action="{{route('qualification.destroy',['user'=>$user,'qualification'=> $qualification])}}" class="pull-right" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <a href="{{route('qualification.edit',['user'=>$user,'qualification'=> $qualification])}}" class="btn btn-primary btn-xs">
                            <span class="glyphicon glyphicon-edit"></span>
                            Edit
                          </a>
                          <button type="submit" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash"></span>
                            Delete
                          </button>
                        </form>
                      </h4>
                    </div>
                    <div id="{{$qualification->type}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">
                        <table class="table table-bordered">
                          <tbody>
                          @if($qualification->type == "10_th")

                            @if($qualification->completed)
                              <tr>
                                <td>Year</td>
                                <td>{{$qualification->completed}}</td>
                              </tr>
                            @endif
                            <tr>
                              <td>Performance</td>
                              <td>{{$qualification->mark}} ({{$qualification->mark_type_name}})</td>
                            </tr>
                          @elseif($qualification->type =="12_th")
                            @if($qualification->completed)
                              <tr>
                                <td>Completed</td>
                                <td>{{$qualification->completed}}</td>
                              </tr>
                            @endif
                            @if($qualification->stream)
                              <tr>
                                <td>Stream</td>
                                <td>{{$qualification->stream}}</td>
                              </tr>
                            @endif
                            <tr>
                              <td>Performance</td>
                              <td>{{$qualification->mark}} ({{$qualification->mark_type_name}})</td>
                            </tr>

                          @elseif($qualification->type =="graduation")
                            <tr>
                              <td>College Name</td>
                              <td>{{$qualification->college_name}}</td>
                            </tr>
                            <tr>
                              <td>Star Year</td>
                              <td>{{$qualification->started_at}}</td>
                            </tr>
                            <tr>
                              <td>Completed Year</td>
                              <td>{{$qualification->completed_at}}</td>
                            </tr>
                            <tr>
                              <td>Degree</td>
                              <td>{{strtoupper(str_replace('_',' ',$qualification->degree))}}</td>
                            </tr>
                            <tr>
                              <td>Stream</td>
                              <td>{{strtoupper(str_replace('_',' ',$qualification->stream))}}</td>
                            </tr>
                            <tr>
                              <td>Performance</td>
                              <td>{{$qualification->mark}} ({{$qualification->mark_type_name}})</td>
                            </tr>
                          @elseif($qualification->type == 'post_graduation')
                            <tr>
                              <td>College Name</td>
                              <td>{{$qualification->college_name}}</td>
                            </tr>
                            <tr>
                              <td>Start Year</td>
                              <td>{{$qualification->started_at}}</td>
                            </tr>
                            <tr>
                              <td>End Year</td>
                              <td>{{$qualification->completed_at}}</td>
                            </tr>
                            <tr>
                              <td>Degree</td>
                              <td>{{strtoupper(str_replace('_',' ',$qualification->degree))}}</td>
                            </tr>
                            <tr>
                              <td>Performance</td>
                              <td>{{$qualification->mark}} ({{$qualification->mark_type_name}})</td>
                            </tr>
                          @elseif($qualification->type == 'phd')
                            <tr>
                              <td>College Name</td>
                              <td>{{$qualification->college_name}}</td>
                            </tr>
                            <tr>
                              <td>Start Year</td>
                              <td>{{$qualification->started_at}}</td>
                            </tr>
                            <tr>
                              <td>Completed Year</td>
                              <td>{{$qualification->completed_at}}</td>
                            </tr>
                            <tr>
                              <td>Steam</td>
                              <td>{{$qualification->stream}}</td>
                            </tr>
                            <tr>
                              <td>Performance</td>
                              <td>{{$qualification->mark}} ({{$qualification->mark_type_name}})</td>
                            </tr>
                          @elseif($qualification->type == 'diploma')
                            <tr>
                              <td>College Name</td>
                              <td>{{$qualification->college_name}}</td>
                            </tr>
                            <tr>
                              <td>Started at</td>
                              <td>{{$qualification->started_at}}</td>
                            </tr>
                            <tr>
                              <td>Completed at</td>
                              <td>{{$qualification->completed_at}}</td>
                            </tr>
                            <tr>
                              <td>Stream</td>
                              <td>{{$qualification->stream}}</td>
                            </tr>
                            <tr>
                              <td>Performance</td>
                              <td>{{$qualification->mark}} ({{$qualification->mark_type_name}})</td>
                            </tr>
                          @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
          <div class="tab-pane fade" id="tab2">
            @php
              $diff_array = array_diff($general_options,$available_options);
            @endphp
            <div class="qualification add-new">
              <ul class="list-group c-list-group">
                @foreach($diff_array as $add_new)
                  <li class="list-group-item clearfix">
                    <a href="" class="clearfix" data-toggle="modal" data-target="#{{$add_new}}">
                      @qualificationType($add_new)
                      <span class="glyphicon glyphicon-plus"></span>
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="tab-pane fade" id="tab3">
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('modal')
  @foreach($diff_array as $add_modal)
    <div class="modal fade" id="{{$add_modal}}">
    	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
          <form action="{{route('qualification.index',['user'=> $user])}}" method="post">
            {{csrf_field()}}
            {{method_field('POST')}}
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    				<h4 class="modal-title">@qualificationType($add_new)</h4>
    			</div>
    			<div class="modal-body">
    				@if($add_modal=="10_th")
              @include('register.student.qual_partials._10_th')
            @elseif($add_modal == "12_th")
              @include('register.student.qual_partials._12_th')
            @elseif($add_modal == "graduation")
              @include('register.student.qual_partials._graduation')
            @elseif($add_modal == "post_graduation")
              @include('register.student.qual_partials._post_graduation')
            @elseif($add_modal == 'phd')
              @include('register.student.qual_partials._phd')
            @elseif($add_modal == 'diploma')
              @include('register.student.qual_partials._diploma')
            @endif
    			</div>
    			<div class="modal-footer">
    				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				<button type="submit" class="btn btn-primary">
              <span class="glyphicon glyphicon-plus"></span>
              Add
            </button>
    			</div>
          </form>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  @endforeach
@stop