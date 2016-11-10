@extends('layouts.user')
@section('content')

      <div class="col-xs-12 col-sm-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2>
              {{$qualification->qualification_type}}
            </h2>
          </div>
          <div class="panel-body">
            <form action="{{route('qualification.update',['user'=> $user,'qualification'=> $qualification])}}" class="form-horizontal" method="post">
              {{csrf_field()}}
              {{method_field('PUT')}}
              @if($qualification->type == '10_th' || $qualification->type == '12_th' )
              <!-- 10th standard -->
                <div class="form-group">
                  <label for="" class="control-label col-sm-4 text-left">Completed Year</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control year-datepicker" placeholder="Completed Year"
                           name="qualification[completed]" value="{{$qualification->completed}}">
                  </div>
                </div>

                <!-- 12th standard -->
                @if($qualification->type == '12_th')
                  <div class="form-group text-left    ">
                    <label for="" class="control-label col-sm-4 text-left">Stream</label>
                    <div class="col-sm-8">
                      <select  class="form-control"  name="qualification[stream]">
                        <option value="">Select</option>
                        @if(isset($qualifications_type['12_th']))
                          @foreach($qualifications_type['12_th'] as $common)
                            <option value="{{$common['id']}}" @if($qualification->stream== $common['id']) selected="selected" @endif>{{$common['name']}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                @endif
                <!-- eof 12th standard -->
                <div class="form-group">
                  <div class="col-xs-12 col-sm-12">
                    <div class="row qualification-section">
                      <div class="col-xs-12 col-sm-6">
                        <label for="" class="control-label">Percentage / CGPA</label>
                        <select name="qualification[mark_type]" id="" class="q-type form-control">
                          <option value="">Select</option>
                          <option value="cgpa_4"  @if($qualification->mark_type == "cgpa_4")selected="selected"@endif >CGPA 4</option>
                          <option value="cgpa_10" @if($qualification->mark_type == "cgpa_10")selected="selected"@endif >CGPA 10</option>
                          <option value="percentage"  @if($qualification->mark_type == "percentage")selected="selected"@endif >Percentage</option>
                        </select>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <label for="" class="q-mark control-label">Performance</label>
                        <input type="text" class="form-control" value="{{$qualification->mark}}"
                               name="qualification[mark]" placeholder="Performance">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- eof 10th standard -->
              @elseif($qualification->type == 'graduation')
              <!-- Graduation -->
              @php
                $graduation_degree = [];
                $graduation_stream = [];
                if(isset($qualifications_type['graduation'])){
                  $graduation_degree = array_where($qualifications_type['graduation'], function($value){
                    return $value['type'] == 'degree' || $value['type'] == 'Degree';
                  });
                  $graduation_stream = array_where($qualifications_type['graduation'], function($value){
                    return $value['type'] == 'stream' || $value['type'] == 'Stream';
                  });
                }
              @endphp
                <div class="form-group form-group-reset">
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">College Name</label>
                          <input type="text" placeholder="College name" name="qualification[college_name]"
                                 class="form-control" value="{{$qualification->college_name}}">
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label for="" class="control-label">Start Year</label>
                              <input type="text" class="form-control year-datepicker" name="qualification[started_at]"
                                     placeholder="Started at" value="{{$qualification->started_at}}">
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label for="" class="control-label">End Year</label>
                              <input type="text" class="form-control year-datepicker" name="qualification[completed_at]"
                                     placeholder="Completed at" value="{{$qualification->completed_at}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="control-label">Degree</label>
                          <select name="qualification[degree]" id="" class="form-control">
                            <option value="">Select</option>
                            @foreach($graduation_degree as $degree)
                              <option value="{{$degree['id']}}"
                                      @if(isset($qualification->degree) && $qualification->degree == $degree['id']) selected="selected" @endif>
                                {{$degree['name']}}</option>
                            @endforeach
                          </select>
                        </div>

                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">Stream</label>
                          <select name="qualification[stream]" id="" class="form-control">
                            <option value="">Select</option>
                            @foreach($graduation_stream as $stream)
                              <option value="{{$stream['id']}}"
                                @if(isset($qualification->stream) && $qualification->stream == $stream['id']) selected="selected" @endif
                                >{{$stream['name']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="row qualification-section">
                          <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
                            <select name="qualification[mark_type]" id="" class="q-type form-control">
                              <option value="">Select</option>
                              <option value="cgpa_4" @if($qualification->mark_type == "cgpa_4") selected="selected" @endif>CGPA 4</option>
                              <option value="cgpa_10" @if($qualification->mark_type == "cgpa_10") selected="selected" @endif>CGPA 10</option>
                              <option value="percentage" @if($qualification->mark_type == "percentage") selected="selected" @endif> Percentage</option>
                            </select>
                          </div>
                          <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
                            <input type="text" class="q-mark form-control" name="qualification[mark]" placeholder="Performance"
                            value="{{$qualification->mark}}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- eof graduation -->
              @elseif($qualification->type == 'post_graduation')
              <!-- Post graduation -->
                <div class="form-group form-group-reset">
                  <div class="col-xs-12">
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">College Name</label>
                          <input type="text" placeholder="College name" name="qualification[post_graduation][college_name]"
                                 class="form-control" value="{{$qualification->college_name}}">
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label for="" class="control-label">Start Year</label>
                              <input type="text" class="form-control year-datepicker" name="qualification[started_at]"
                                     placeholder="Started at" value="{{$qualification->started_at}}">
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                              <label for="" class="control-label">End Year</label>
                              <input type="text" class="form-control year-datepicker" name="qualification[completed_at]"
                                     placeholder="Completed at" value="{{$qualification->completed_at}}">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="control-label">Stream</label>
                          <select name="qualification[stream]" id="" class="form-control">
                            <option value="">Select</option>
                            @if(isset($qualifications_type['post_graduation']))
                              @foreach($qualifications_type['post_graduation'] as $post_graduation)
                                <option value="{{$post_graduation['id']}}"
                                  @if(isset($qualification->stream) && $qualification->stream == $post_graduation['id']) selected="selected" @endif
                                  >{{$post_graduation['name']}}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>

                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="row qualification-section">
                          <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
                            <select name="qualification[mark_type]" id="" class="q-type form-control">
                              <option value="">Select</option>
                              <option value="cgpa_4" @if($qualification->mark_type=="cgpa_4") selected ="selected" @endif >CGPA 4</option>
                              <option value="cgpa_10" @if($qualification->mark_type=="cgpa_10") selected ="selected" @endif >CGPA 10</option>
                              <option value="percentage" @if($qualification->mark_type=="percentage") selected ="selected" @endif >Percentage</option>
                            </select>
                          </div>
                          <div class="col-xs-12 col-sm-6"><label for="" class=" control-label">Mark</label>
                            <input type="text" class="q-mark form-control" name="qualification[mark]" placeholder="Performance"
                                   value="{{$qualification->mark }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- eof post graduation -->
              @elseif($qualification->type == 'phd')
              <!-- PHD -->
                <div class="form-group form-group-reset">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="" class="control-label">College Name</label>
                      <input type="text" placeholder="College name" name="qualification[college_name]"
                             class="form-control college-name" value="{{$qualification->college_name}}">
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">Start Year</label>
                          <input type="text" class="form-control year-datepicker" name="qualification[started_at]"
                                 placeholder="Started at" value="{{$qualification->started_at}}">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">End Year</label>
                          <input type="text" class="form-control year-datepicker" name="qualification[completed_at]"
                                 placeholder="Completed at" value="{{$qualification->created_at}}">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="" class="control-label">Stream</label>
                      <select name="qualification[stream]" id="" class="form-control">
                        <option value="">Select</option>
                        @if(isset($qualifications_type['phd']))
                          @foreach($qualifications_type['phd'] as $phd)
                            <option value="{{$phd['id']}}"
                              @if(isset($qualification->stream) && $qualification->stream == $phd['id']) selected="selected" @endif
                              >{{$phd['name']}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="qualification-section">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
                          <select name="qualification[mark_type]" id="" class="q-type form-control">
                            <option value="cgpa_4"  @if($qualification->mark_type=="cgpa_4") selected="selected" @endif
                            @if(!isset($qualification->mark_type) || !$qualification->mark_type) selected="selected" @endif
                            >CGPA 4</option>
                            <option value="cgpa_10" @if($qualification->mark_type=="cgpa_10") selected="selected" @endif >CGPA 10</option>
                            <option value="percentage" @if($qualification->mark_type=="percentage") selected="selected" @endif >Percentage</option>
                          </select>
                        </div>
                        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
                          <input type="number" class="q-mark form-control" name="qualification[mark]"
                                 placeholder="Performance"
                                 step="0.01"  min="0" max="4"
                                 value="{{$qualification->mark}}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- eof php -->
              @elseif($qualification->type == 'diploma')
              <!-- Diploma -->
                <div class="form-group form-group-reset">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="" class="control-label">College Name</label>
                      <input type="text" placeholder="College name" name="qualification[college_name]"
                             class="form-control college-name"
                        value="{{$qualification->college_name}}">
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">Start Year</label>
                          <input type="text" class="form-control year-datepicker" name="qualification[started_at]"
                                 placeholder="Started at" value="{{$qualification->started_at}}">
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">End Year</label>
                          <input type="text" class="form-control year-datepicker" name="qualification[completed_at]"
                                 placeholder="Completed at" value="{{$qualification->created_at}}">
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="" class="control-label">Stream</label>
                      <select name="qualification[stream]" id="" class="form-control">
                        <option value="">Select</option>
                        @if(isset($qualifications_type['diploma']))
                          @foreach($qualifications_type['diploma'] as $diploma)
                            <option value="{{$diploma['id']}}"
                              @if(isset($qualification->stream) && $qualification->stream == $diploma['id']) selected="selected" @endif
                              >{{$diploma['name']}}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="qualification-section">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
                          <select name="qualification[mark_type]" id="" class="q-type form-control">
                            <option value="cgpa_4"  @if($qualification->mark_type=="cgpa_4") selected="selected" @endif
                            @if(!isset($qualification->mark_type) || !$qualification->mark_type) selected="selected" @endif
                              >CGPA 4</option>
                            <option value="cgpa_10" @if($qualification->mark_type=="cgpa_10") selected="selected" @endif >CGPA 10</option>
                            <option value="percentage" @if($qualification->mark_type=="percentage") selected="selected" @endif >Percentage</option>
                          </select>
                        </div>
                        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
                          <input type="number" class="q-mark form-control" name="qualification[mark]"
                                 placeholder="Performance"
                                 step="0.01"  min="0" max="4" value="{{$qualification->mark}}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



                <!-- eof diploma -->
              @endif
              <div class="form-group">
                <div class="col-xs-12 text-right">
                  <button class="btn btn-primary btn-md" type="submit">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

@stop