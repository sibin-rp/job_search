@extends('layouts.home')
@section('content')
  <div class="company-info-register register-wrapper">
    <div class="container">
      <div class="register">
        <div class="row">
          <div class="col-xs-12">
            <div class="">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Add Internship</h3>
                </div>
                <div class="panel-body">
                  <form action="{{route('save_company_internship_form')}}" method="post" data-parsley-validate="">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <label for="" class="control-label">Field of Internship</label>
                          <select name="internship[default][internship_field_id]" id="internship-field"
                                  class="form-control select-2-select" data-url="{{route('api_get_skills_by_id')}}">
                            <option value="" selected="selected">None</option>
                            @foreach($internship_fields as $field)
                              <option value="{{$field['id']}}">{{$field['name']}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="" class="control-label">Job Title</label>
                          <input type="text" name="internship[default][title]" class="form-control"
                                 placeholder="Job Title" required="">
                        </div>
                        <div class="form-group">
                          <label for="" class="control-label">Description</label>
                         <textarea name="internship[default][description]" id="" cols="30" rows="5" class="form-control"
                                   placeholder="Joob description" required=""></textarea>
                        </div>
                        <div class="form-group"><label for="" class="control-label">Stipend
                            <small>(From - To (In Rupees))</small>
                          </label>

                          <div class="div clearfix">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-6">
                                <select name="internship[default][stipend_from]" id="" class="form-control" required="">
                                  <option value="1000">1000</option>
                                  <option value="2000">2000</option>
                                  <option value="3000">3000</option>
                                  <option value="4000">4000</option>
                                  <option value="5000">5000</option>
                                  <option value="6000">6000</option>
                                  <option value="7000">7000</option>
                                  <option value="8000">8000</option>
                                  <option value="9000">9000</option>
                                  <option value="10000">10000</option>
                                </select>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-6">
                                <select name="internship[default][stipend_to]" id="" class="form-control" required="">
                                  <option value="1000">1000</option>
                                  <option value="2000">2000</option>
                                  <option value="3000">3000</option>
                                  <option value="4000">4000</option>
                                  <option value="5000">5000</option>
                                  <option value="6000">6000</option>
                                  <option value="7000">7000</option>
                                  <option value="8000">8000</option>
                                  <option value="9000">9000</option>
                                  <option value="10000">10000</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="control-label">Duration of Internship</label>

                          <div class="clearfix">
                            <p>
                              <label for=""><input type="radio" name="internship[default][duration]" required=""
                                                   checked="">&nbsp;Any</label>
                              <label for="">&nbsp;<input type="radio" name="internship[default][duration]">&nbsp;0-3
                                Month</label>
                              <label for="">&nbsp;<input type="radio" name="internship[default][duration]">&nbsp;3-6
                                Month</label>
                              <label for="">&nbsp;<input type="radio" name="internship[default][duration]">&nbsp;6-9
                                Month&</label>
                              <label for="">&nbsp;<input type="radio" name="internship[default][duration]">&nbsp;9-12
                                Month</label>
                              <label for="">&nbsp;<input type="radio" name="internship[default][duration]">&nbsp;1 Year
                                +</label>
                            </p>

                            <p>
                              Or Select Date
                            </p>

                            <div class="row">
                              <div class="col-xs-12 col-sm-6"><input name="internship[duration_start]" type="text"
                                                                     class="form-control internship-duration"
                                                                     id="internship-duration-start"
                                                                     placeholder="Duration start"></div>
                              <div class="col-xs-12 col-sm-6"><input name="internship[duration_end]" type="text"
                                                                     class="form-control internship-duration"
                                                                     id="internship-duration-end"
                                                                     placeholder="Duration end"></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="control-label">Type Of Internship</label>

                          <div class="clearfix">
                            <p>
                              <label for="" class="control-label"><input type="radio" name="internship[default][type]"
                                                                         value="any" required="" checked="">&nbsp;Any&nbsp;
                              </label>
                              <label for="" class="control-label"><input type="radio" name="internship[default][type]"
                                                                         value="full_time_office">Full Time (Office)&nbsp;
                              </label>
                              <label for="" class="control-label"><input type="radio" name="internship[default][type]"
                                                                         value="part_time_office">&nbsp;Part Time
                                (Office)&nbsp;</label>
                              <label for="" class="control-label"><input type="radio" name="internship[default][type]"
                                                                         value="full_time_home">&nbsp;Work from Home
                                (Full time)&nbsp;</label>
                              <label for="" class="control-label"><input type="radio" name="internship[default][type]"
                                                                         value="part_time_home">&nbsp;Work from Home
                                (Part time)&nbsp;</label>
                            </p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="control-label">Location Of Internship</label>

                          <div class="clearfix">
                            <div class="row">
                              <div class="col-xs-12 col-sm-6"><p>City</p>

                                <p>
                                  <input type="text" class="form-control" name="internship[default][city]"
                                         placeholder="Internship City" required="">
                                </p></div>
                              <div class="col-xs-12 col-sm-6"><p>State</p>

                                <p>
                                  <select name="internship[default][state]" id="internship-state" class="form-control">
                                    @foreach($states as $code => $state)
                                      <option value="{{$code}}">{{$state}}</option>
                                    @endforeach
                                  </select>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <!-- QUALIFICATION START -->
                        <div class="form-group">
                          <label for="" class="control-label">Minimum Qualification</label>
                          <div class="clearfix">
                            <label for="" class="control-label"><input class="internship-qualification-select"
                                                                       type="radio"
                                                                       name="internship[qualification][qualification]"
                                                                       data-extra="false" data-type="any" value="any"
                                                                       checked="checked">&nbsp;Any&nbsp;</label>
                            <label for="" class="control-label"><input class="internship-qualification-select"
                                                                       type="radio"
                                                                       name="internship[qualification][qualification]"
                                                                       data-extra="true" data-type="10_th"
                                                                       value="10_th">&nbsp;10 <sup>th</sup>&nbsp;
                            </label>
                            <label for="" class="control-label"><input class="internship-qualification-select"
                                                                       type="radio"
                                                                       name="internship[qualification][qualification]"
                                                                       data-extra="true" data-type="12_th"
                                                                       value="12_th">&nbsp;12 <sup>th</sup>&nbsp;
                            </label>
                            <label for="" class="control-label"><input class="internship-qualification-select"
                                                                       type="radio"
                                                                       name="internship[qualification][qualification]"
                                                                       data-extra="true" data-type="graduation"
                                                                       value="graduation">&nbsp;Graduation&nbsp;</label>
                            <label for="" class="control-label"><input class="internship-qualification-select"
                                                                       type="radio"
                                                                       name="internship[qualification][qualification]"
                                                                       data-extra="true" data-type="post_graduation"
                                                                       value="post_graduation">&nbsp;Post Graduation&nbsp;
                            </label>
                            <label for="" class="control-label"><input class="internship-qualification-select"
                                                                       type="radio"
                                                                       name="internship[qualification][qualification]"
                                                                       data-extra="true" data-type="diploma"
                                                                       value="diploma">&nbsp;Diploma&nbsp;</label>
                            <label for="" class="control-label"><input class="internship-qualification-select"
                                                                       type="radio"
                                                                       name="internship[qualification][qualification]"
                                                                       data-extra="true" data-type="phd" value="phd">&nbsp;PhD&nbsp;
                            </label>
                          </div>
                          <div class="qualification-main-box">
                            <!-- 10th standard -->
                            <div class="qualification-inbox hidden" data-box="10_th">
                              <div class="clearfix">
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h4 class="panel-title">
                                      10th Standard
                                    </h4>
                                  </div>
                                  <div class="panel-body qualification-section">
                                    <div class="row">
                                      <div class="col-xs-12 col-sm-4">
                                        <label for="">Choose</label>
                                        <select name="internship[qualification][10_th][mark_type]" id=""
                                                class="q-type form-control">
                                          <option value="cgpa_4" selected="selected">CGPA 4</option>
                                          <option value="cgpa_10" class="">CGPA 10</option>
                                          <option value="percentage">Percentage</option>
                                        </select>
                                      </div>
                                      <div class="col-xs-12 col-sm-8 twelth-marks-field">
                                        <input type="number" class="form-control q-mark dateField" id="field1"
                                               name="internship[qualification][10_th][mark]" placeholder="Marks"
                                               step="0.01" min="0" max="4">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end 10th standard -->
                            <!-- 12th standard -->
                            <div class="qualification-inbox hidden" data-box="12_th">
                              <div class="clearfix ">
                                <div class="panel panel-default">
                                  <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                      12th Standard
                                    </h4>
                                  </div>
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="col-xs-12">
                                        <div class="form-group">
                                          <label for="">Stream</label>
                                          <select name="internship[qualification][12_th][stream]" id=""
                                                  class="form-control">
                                            <option value="">Select</option>
                                            @if(isset($qualifications['12_th']))
                                              @foreach($qualifications['12_th'] as $twelve_stream)
                                                <option
                                                  value="{{$twelve_stream['id']}}">{{$twelve_stream['name']}}</option>
                                              @endforeach
                                            @endif
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row qualification-section">
                                      <div class="col-xs-12 col-sm-4">
                                        <label for="">Choose</label>
                                        <select name="internship[qualification][12_th][mark_type]" id=""
                                                class="q-type form-control">
                                          <option value="cgpa_4" selected="selected">CGPA 4</option>
                                          <option value="cgpa_10" class="">CGPA 10</option>
                                          <option value="percentage">Percentage</option>
                                        </select>
                                      </div>
                                      <div class="col-xs-12 col-sm-8 twelth-marks-field">
                                        <input type="number" class="form-control q-mark dateField" id="field1"
                                               name="internship[qualification][12_th][mark]" placeholder="Marks"
                                               step="0.01" min="0" max="4">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- end 12th standard -->
                            <!-- Graduation -->
                            <div class="qualification-inbox hidden" data-box="graduation">
                              <div class="clearfix">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        Graduation
                                      </h4>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <div class="form-group">
                                            <label for="">Degree</label>
                                            @php
                                            $graduation_degree = [];
                                            $graduation_stream = [];

                                            if(isset($qualifications['graduation'])){
                                            $graduation_degree = array_where($qualifications['graduation'],
                                            function($value){
                                            return $value['type'] == 'degree' || $value['type'] == 'Degree';
                                            });
                                            $graduation_stream = array_where($qualifications['graduation'],
                                            function($value){
                                            return $value['type'] == 'stream' || $value['type'] == 'Stream';
                                            });
                                            }
                                            @endphp
                                            <select name="internship[qualification][graduation][degree]" id=""
                                                    class="form-control">
                                              <option value="">Select</option>
                                              @if(isset($qualifications['graduation']))
                                                @foreach($graduation_degree as $degree)
                                                  <option value="{{$degree['id']}}">{{$degree['name']}}</option>
                                                @endforeach
                                              @endif
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <div class="form-group">
                                            <label for="">Stream</label>
                                            <select name="internship[qualification][graduation][stream]" id=""
                                                    class="form-control">
                                              <option value="">Select</option>
                                              @if(isset($qualifications['graduation']))
                                                @foreach($graduation_stream as $stream)
                                                  <option value="{{$stream['id']}}">{{$stream['name']}}</option>
                                                @endforeach
                                              @endif
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row qualification-section">
                                        <div class="col-xs-12 col-sm-4">
                                          <label for="">Type</label>
                                          <select name="internship[qualification][graduation][mark_type]" id=""
                                                  class="form-control q-type">
                                            <option value="cgpa_4" selected="selected">CGPA 4</option>
                                            <option value="cgpa_10" class="">CGPA 10</option>
                                            <option value="percentage">Percentage</option>
                                          </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                          <label for="">Performance</label>
                                          <input type="number" class="form-control q-mark" placeholder="Mark"
                                                 name="internship[qualification][graduation][mark]"
                                                 step="0.01" min="0" max="4">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end graduation -->
                            <!-- Post Graduation -->
                            <div class="qualification-inbox hidden" data-box="post_graduation">
                              <div class="clearfix">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        Post Graduation
                                      </h4>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <div class="form-group">
                                            <label for="">Degree</label>
                                            <select name="internship[qualification][post_graduation][degree]"
                                                    id="" class="form-control">
                                              <option value="">Select</option>
                                              @if(isset($qualifications['post_graduation']))
                                                @foreach($qualifications['post_graduation'] as $post_graduation)
                                                  <option
                                                    value="{{$post_graduation['id']}}">{{$post_graduation['name']}}</option>
                                                @endforeach
                                              @endif
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row qualification-section">
                                        <div class="col-xs-12 col-sm-4">
                                          <label for="">Type</label>
                                          <select name="internship[qualification][post_graduation][mark_type]" id=""
                                                  class="form-control q-type">
                                            <option value="cgpa_4" selected="selected">CGPA 4</option>
                                            <option value="cgpa_10" class="">CGPA 10</option>
                                            <option value="percentage">Percentage</option>
                                          </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                          <div class="form-group">
                                            <label for="" class="control-label">Mark</label>
                                            <input type="number" class="form-control q-mark" placeholder="Mark"
                                                   name="internship[qualification][post_graduation][mark]"
                                                   step="0.01" min="0" max="4">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end post graduation -->
                            <!-- Diploma -->
                            <div class="qualification-inbox hidden" data-box="diploma">
                              <div class="clearfix ">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        Diploma
                                      </h4>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <div class="form-group">
                                            <label for="">Degree</label>
                                            <select name="internship[qualification][diploma][degree]"
                                                    id="" class="form-control">
                                              <option value="">Select</option>
                                              @if(isset($qualifications['diploma']))
                                                @foreach($qualifications['diploma'] as $diploma)
                                                  <option value="{{$diploma['id']}}">{{$diploma['name']}}</option>
                                                @endforeach
                                              @endif
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row qualification-section">
                                        <div class="col-xs-12 col-sm-4">
                                          <label for="">Type</label>
                                          <select name="internship[qualification][diploma][mark_type]" id=""
                                                  class="form-control q-type">
                                            <option value="cgpa_4" selected="selected">CGPA 4</option>
                                            <option value="cgpa_10" class="">CGPA 10</option>
                                            <option value="percentage">Percentage</option>
                                          </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                          <div class="form-group">
                                            <label for="" class="control-label">Mark</label>
                                            <input type="number" class="form-control q-mark" placeholder="Mark"
                                                   name="internship[qualification][diploma][mark]"
                                                   step="0.01" min="0" max="4">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end diploma -->
                            <!-- Phd -->
                            <div class="qualification-inbox hidden" data-box="phd">
                              <div class="clearfix">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        Phd
                                      </h4>
                                    </div>
                                    <div class="panel-body">
                                      <div class="row">
                                        <div class="col-xs-12">
                                          <div class="form-group">
                                            <label for="">Degree</label>
                                            <select name="internship[qualification][phd][degree]"
                                                    id="" class="form-control">
                                              <option value="">Select</option>
                                              @if(isset($qualifications['phd']))
                                                @foreach($qualifications['phd'] as $phd)
                                                  <option value="{{$phd['id']}}">{{$phd['name']}}</option>
                                                @endforeach
                                              @endif
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row qualification-section">
                                        <div class="col-xs-12 col-sm-4">
                                          <label for="">Type</label>
                                          <select name="internship[qualification][phd][mark_type]" id=""
                                                  class="q-type form-control">
                                            <option value="cgpa_4" selected="selected">CGPA 4</option>
                                            <option value="cgpa_10" class="">CGPA 10</option>
                                            <option value="percentage">Percentage</option>
                                          </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-8">
                                          <div class="form-group">
                                            <label for="" class="control-label">Mark</label>
                                            <input type="number" class="form-control q-mark" placeholder="Mark"
                                                   name="internship[qualification][phd][mark]" step="0.01" min="0"
                                                   max="4">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- end phd -->
                            </div>
                            <!-- end phd -->
                          </div>
                        </div>
                        <!--  END QUALIFICATION SECTION -->
                        <div class="form-group">
                          <label for="" class="control-label">Eligibility</label>

                          <div class="clearfix">
                            <div class="row">
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group"><input type="number" class="form-control"
                                                               name="internship[default][eligible_min]" min="15"
                                                               max="40" placeholder="Minimum eligibility Age"></div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group"><input type="number" class="form-control"
                                                               name="internship[default][eligible_max]" min="15"
                                                               max="40" placeholder="Maximum eligibility Age"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">Skills Required </label>

                          <div class="alert alert-info" id="skill-info-box">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                            Please select Internship field
                          </div>
                          <div class="skills-box hidden">
                            <p>
                              Choose Skills from Below
                            </p>

                            <div class="well" id="skill-well">

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row"></div>
                    <div class="section-divider"></div>
                    <!-- START FURTHER DETAILS -->
                    <div class="row">
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <p>
                            Number of resume to be sent in a single round.
                          </p>
                          <select name="internship[default][num_resume]" id="" class="form-control">
                            @for($i=1;$i<10;$i++)
                              <option value="{{$i*5}}">{{$i*5}} Resumes</option>
                            @endfor
                          </select>
                        </div>
                        <div class="form-group">
                          <p>Pre Recruitment exercise for intern</p>

                          <p>
                            <label for="" class="control-label"><input type="radio"
                                                                       name="internship[default][pre_rec_exercise]"
                                                                       value="none">&nbsp;None&nbsp;</label>
                            <label for="" class="control-label"><input type="radio"
                                                                       name="internship[default][pre_rec_exercise]"
                                                                       value="sample_work">&nbsp;Sample Work&nbsp;
                            </label>
                            <label for="" class="control-label"><input type="radio"
                                                                       name="internship[default][pre_rec_exercise]"
                                                                       value="telephone_interview">&nbsp;Telephone
                              Interview&nbsp;</label>
                            <label for="" class="control-label"><input type="radio"
                                                                       name="internship[default][pre_rec_exercise]"
                                                                       value="one_to_one_interview">&nbsp;One to One
                              Interview&nbsp;</label>
                            <label for="" class="control-label"><input type="radio"
                                                                       name="internship[default][pre_rec_exercise]"
                                                                       value="video_interview">&nbsp;Video Interview&nbsp;
                            </label>
                            <label for="" class="control-label"><input type="radio"
                                                                       name="internship[default][pre_rec_exercise]"
                                                                       value="chat">&nbsp;Chat&nbsp;</label>
                            <label for="" class="control-label"><input type="radio"
                                                                       name="internship[default][pre_rec_exercise]"
                                                                       value="other">&nbsp;Other&nbsp;</label>
                          </p>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                          <p>Payment to Intern</p>

                          <p>
                            <label for="" class="control-label"><input type="radio" name="internship[default][payment]"
                                                                       value="weekly">&nbsp;Weekly&nbsp;</label>
                            <label for="" class="control-label"><input type="radio" name="internship[default][payment]"
                                                                       value="fortnightly">&nbsp;Fortnighlty&nbsp;
                            </label>
                            <label for="" class="control-label"><input type="radio" name="internship[default][payment]"
                                                                       value="monthly">&nbsp;Monthly&nbsp;</label>
                          </p>
                        </div>
                        <div class="form-group">
                          <p class="clearfix">
                            Validity of Internship
                            <a href="javascript:void(0)" class="pull-right" data-toggle="popover" data-placement="left"
                               title="Validity of Internship"
                               data-content="The Organization must necessarily provide a certificate recognizing the concerned intern's
                              work and clearly stating the duration. If a certificate cannot be provided then the
                              organization must ensure to provide at least recognition of the work done one the
                              company's letter head.">
                              <span class="glyphicon glyphicon-info-sign"></span>
                            </a>
                          </p>

                          <p>
                            <input type="text" class="form-control date-picker" placeholder="Validity of Internship"
                                   value="" name="internship[default][validity]">
                          </p>
                        </div>
                      </div>
                    </div>
                    <!-- END FURTHER DETAILS -->
                    <hr>
                    <div class="row">
                      <div class="col-xs-12 finish text-right">
                        <button type="submit" class="btn">Complete Registration</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop