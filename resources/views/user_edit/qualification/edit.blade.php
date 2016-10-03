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
                      <select  class="form-control"  name="qualification[steam]">
                        <option value="">Select</option>
                        <option value=""></option>
                      </select>
                    </div>
                  </div>
                @endif
                <!-- eof 12th standard -->
                <div class="form-group">
                  <div class="col-xs-12 col-sm-12">
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <label for="" class="control-label">Percentage / CGPA</label>
                        <select name="qualification[mark_type]" id="" class="form-control">
                          <option value="">Select</option>
                          <option value="cgpa_4"  @if($qualification->mark_type == "cgpa_4")selected="selected"@endif >CGPA 4</option>
                          <option value="cgpa_10" @if($qualification->mark_type == "cgpa_10")selected="selected"@endif >CGPA 10</option>
                          <option value="percentage"  @if($qualification->mark_type == "percentage")selected="selected"@endif >Percentage</option>
                        </select>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <label for="" class="control-label">Performance</label>
                        <input type="text" class="form-control" value="{{$qualification->mark}}"
                               name="qualification[mark]" placeholder="Performance">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- eof 10th standard -->
              @elseif($qualification->type == 'graduation')
              <!-- Graduation -->
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
                            <option value="b_tech">B-Tech</option>
                            <option value="bse_physics">BSE - Physics</option>
                            <option value="bse_maths">BSE - Maths</option>
                          </select>
                        </div>

                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">Stream</label>
                          <select name="qualification[stream]" id="" class="form-control">
                            <option value="">Select</option>
                            <option value="b_tech">B-Tech</option>
                            <option value="bse_physics">BSE - Physics</option>
                            <option value="bse_maths">BSE - Maths</option>
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
                            <select name="qualification[mark_type]" id="" class="form-control">
                              <option value="">Select</option>
                              <option value="cgpa_4" @if($qualification->mark_type == "cgpa_4") selected="selected" @endif>CGPA 4</option>
                              <option value="cgpa_10" @if($qualification->mark_type == "cgpa_10") selected="selected" @endif>CGPA 10</option>
                              <option value="percentage" @if($qualification->mark_type == "percentage") selected="selected" @endif> Percentage</option>
                            </select>
                          </div>
                          <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
                            <input type="text" class="form-control" name="qualification[mark]" placeholder="Performance"
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
                          <label for="" class="control-label">Degree</label>
                          <select name="qualification[degree]" id="" class="form-control">
                            <option value="">Select</option>
                            <option value="b_tech">B-Tech</option>
                            <option value="bse_physics">BSE - Physics</option>
                            <option value="bse_maths">BSE - Maths</option>
                          </select>
                        </div>

                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
                            <select name="qualification[mark_type]" id="" class="form-control">
                              <option value="">Select</option>
                              <option value="cgpa_4" @if($qualification->mark_type=="cgpa_4") selected ="selected" @endif >CGPA 4</option>
                              <option value="cgpa_10" @if($qualification->mark_type=="cgpa_10") selected ="selected" @endif >CGPA 10</option>
                              <option value="percentage" @if($qualification->mark_type=="percentage") selected ="selected" @endif >Percentage</option>
                            </select>
                          </div>
                          <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
                            <input type="text" class="form-control" name="qualification[mark]" placeholder="Performance" value="{{$qualification->mark }}">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- eof post graduation -->
              @elseif($qualification->type == 'phd')
              <!-- PHD -->
              <!-- eof php -->
              @elseif($qualification->type == 'diploma')
              <!-- Diploma -->

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