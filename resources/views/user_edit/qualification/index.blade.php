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
                              <td>{{strtoupper(str_replace('_',' ',$qualification->stream))}}</td>
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
                              <td>{{strtoupper(str_replace('_',' ',$qualification->stream))}}</td>
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
            <div class="page-header">
              <h4>
                Academic/Sports/Arts
                <a href="#extra_qualification_modal" class="pull-right" data-toggle="modal">
                  <span class="glyphicon glyphicon-plus"></span>
                  Add
                </a>
              </h4>
            </div>
            @if($extra_qualifications)
              @foreach($extra_qualifications as $key => $extra)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4>@qualificationType($key)</h4>
                  </div>
                  <div class="panel-body">
                    @foreach($extra as $extra_2)
                      <div class="modal fade" id="edit_extra_qua-{{$extra_2->id}}">
                      	<div class="modal-dialog">
                      		<div class="modal-content">
                            <form action="{{route('qualification.update',['user'=> $user,'qualification'=> $extra_2])}}" method="post">
                              {{csrf_field()}}
                              {{method_field('PUT')}}
                            <div class="modal-header">
                      				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      				<h4 class="modal-title">@qualificationType($key) {{$loop->index + 1}}</h4>
                      			</div>
                      			<div class="modal-body">
                              <div class="form-group"><label for="" class="control-label">Title</label><input
                                  type="text" class="form-control" name="qualification[title]" value="{{$extra_2->title}}"></div>
                              <div class="form-group"><label for="" class="control-label">Link</label>
                                <input type="text" class="form-control" name="qualification[link]" value="{{$extra_2->link}}">
                              </div>
                              <div class="form-group"><label for="" class="control-label">Description</label>
                                <textarea name="qualification[description]" id="" cols="30" class="form-control"
                                          rows="3">{{$extra_2->description}}</textarea></div>
                      			</div>
                      			<div class="modal-footer">
                      				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      				<button type="submit" class="btn btn-primary">Save changes</button>
                      			</div>
                            </form>
                      		</div><!-- /.modal-content -->
                      	</div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th colspan="2">
                            @qualificationType($key) {{$loop->index + 1}}
                            <form action="{{route('qualification.destroy',['user'=> $user,'qualification'=> $extra_2])}}"
                                  class="pull-right" method="post">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                              <a href="#edit_extra_qua-{{$extra_2->id}}" class="btn btn-xs btn-primary" data-toggle="modal">Edit</a>
                              <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                            </form>
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Title</td>
                          <td>{{$extra_2->title}}</td>
                        </tr>
                        <tr>
                          <td>Link</td>
                          <td>
                            @if($extra_2->link)
                              <a href="{{$extra_2->link}}">{{$extra_2->link}}</a>
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td>Description</td>
                          <td>{{$extra_2->description}}</td>
                        </tr>
                        </tbody>
                      </table>
                    @endforeach
                  </div>
                </div>
              @endforeach
            @endif
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
  <!-- Extra Qualification modal -->
  <div class="modal fade" id="extra_qualification_modal">
  	<div class="modal-dialog">
  		<div class="modal-content">
        <form action="{{route('qualification.store',['user'=> $user])}}" method="post" id="add_extra_qualification">
          {{csrf_field()}}
          {{method_field('POST')}}
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title">Add other Qualification</h4>
  			</div>
  			<div class="modal-body">
          <div class="form-group">
            <label for="" class="control-label">Type</label>
            <select name="change_type" id="" class="form-control">
              <option value="academic" selected="selected">Academic</option>
              <option value="sports">Sports</option>
              <option value="arts">Arts</option>
            </select>
          </div>
          <div class="form-group"><label for="" class="control-label">Title</label>
            <input type="text" class="form-control change-name" placeholder="Title" name="extra[other][title]">
          </div>
          <div class="form-group"><label for="" class="control-label">Link</label>
            <input type="text" class="form-control change-name" placeholder="Link" name="extra[other][link]">
          </div>
          <div class="form-group">
            <label for="" class="control-label">Description</label>
            <textarea name="extra[other][description]" id="" cols="30" rows="3" class="form-control change-name"
            placeholder="Description"></textarea>
          </div>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary">Add</button>
  			</div>
        </form>
  		</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  <!-- eof extra qualification modal -->
  
  
@stop