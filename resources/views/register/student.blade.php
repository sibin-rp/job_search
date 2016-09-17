@extends('layouts.home')
@section('content')
  <div class="register-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="register">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#personalFormCollapse" aria-expanded="true" aria-controls="collapseOne">
                      Personal
                      <span class="pull-right glyphicon glyphicon-user"></span>
                    </a>
                  </h4>
                </div>
                <div id="personalFormCollapse" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <form action="{{route('save_student_personal_data')}}" method="post" id="personal_info_form">
                      {{csrf_field()}}
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">First Name</label><input type="text" required="required"
                                                                                                       class="form-control" name="first_name" placeholder="First Name">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Last Name</label><input type="text" required="required"
                                                                                                      class="form-control" name="last_name" placeholder="Last Name">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Date Of Birth</label><input type="text" id="dob" required="required"
                                                                                                       class="form-control date-picker" name="dob" placeholder="Data of Birth">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Gender</label>
                          <div class="clearfix">
                            <div class="form-inline">
                              <label for="gender-male"><input id="gender-male" type="radio" value="1" checked="checked" name="sex">&nbsp;Male</label>&nbsp;&nbsp;
                              <label for="gender-female"><input id="gender-female" type="radio" value="2" name="sex">&nbsp;Female</label>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="page-header">
                        <h4>Address</h4>
                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="address-city" class="control-label">Home City</label><input type="text" id="address-city" name="home_address"
                                                                                                         class="form-control" placeholder="City" required="required">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="address-state" class="control-label">State</label>
                            <select name="home_state" id="address-state" class="form-control" required="required">
                              <option value="">Select</option>
                              @foreach($states as $code => $state)
                                <option value="{{$code}}">{{$state}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12">
                          <label for=""><input type="checkbox" id="show-living-address">&nbsp; If you are away from Hometown</label>
                        </div>
                        <div class="col-xs-12">
                          <div id="live-address-fields" class="hidden">
                            <div class="row">
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group"><label for="" class="control-label">Current City</label>
                                  <input type="text" id="living-city" class="form-control" placeholder="Living City" name="live_address">
                                </div>
                              </div>
                              <div class="col-xs-12 col-sm-6">
                                <div class="form-group"><label for="" class="control-label">Current State</label>
                                  <select name="live_state" id="living-state" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($states as $code => $state)
                                      <option value="{{$code}}">{{$state}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Phone Number</label><input type="text" id="phone_no" name="phone_no" required="required"
                                                                                                       class="form-control" placeholder="Phone number">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Alternate Contact</label><input type="text" id="alternate_contact" name="alternate_contact"
                                                                                                       class="form-control" placeholder="Alternate Contact">
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          <div class="form-group"><label for="" class="control-label">Alternate Email</label><input type="text" id="alternate_email" placeholder="Alternate Email"
                                                                                                      class="form-control" name="alternate_email">
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 col-sm-6"><label for="describe" class="control-label">5 Keywords to describe yourself.</label><input type="text" id="describe"
                                                                                                            class="form-control" name="describe" placeholder="Describe yourself">
                        </div>
                      </div>
                      <div class="form-group text-right">
                        <button class="btn" type="submit">
                          <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;
                          Continue
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed clearfix" role="button" data-toggle="collapse" data-parent="#accordion" href="#internshipInfoCollapse" aria-expanded="false" aria-controls="collapseTwo">
                      Internship Preferences
                      <span class="glyphicon glyphicon-cog pull-right"></span>
                    </a>
                  </h4>
                </div>
                <div id="internshipInfoCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <form action="{{route('save_student_internship_data')}}" method="POST" id="internship_info_form">
                      {{csrf_field()}} {{method_field('POST')}}

                      <div id="vue-js-form-field">
                        <div class="row" v-if="internships.length == 0">
                          <div class="col-xs-12">
                            <div class="alert alert-warning">
                              Please Select Internship field to get form.
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-3">
                            <div v-if="internshipExist">
                              <ul class="list-group form-list">
                                <li class="list-group-item" v-for="internship in internships" v-bind:class="{'active':(($index+1) == internships.length)}">
                                  <a href="#internship-field-@{{ internship.id }}" data-toggle="tab" class="clearfix">
                                    @{{internship.name}}
                                    <span class="glyphicon glyphicon-trash" v-on:click="removeFromList(internship,$event)"></span>
                                  </a>

                                </li>
                              </ul>
                            </div>
                            <div>
                              @if(isset($get_fields))
                                <select name="" id="internship-field-selector" class="form-control " v-on:change="insertDataToField($event)">
                                  @foreach($get_fields as $field)
                                    <option value="{{$field['id']}}" data-name="{{$field['name']}}">{{$field['name']}}</option>
                                  @endforeach
                                </select>
                              @endif
                            </div>
                          </div>
                          <div class="col-xs-12 col-sm-9">
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane" v-bind:class="{'active':(($index+1) == internships.length)}" v-for="internship in internships"
                                   id="internship-field-@{{ internship.id }}">
                                <div class="page-header">
                                  <h3>@{{ internship.name }}</h3>
                                </div>
                                <div class="row">
                                  <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                      <label for="" class="control-label">Type of Company</label>
                                      <div class="clearfix">
                                        <label for="" class="control-label"><input type="radio" value="any" checked="checked" name="internship[@{{ internship.id }}][company_type]">&nbsp;Any&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="startup" name="internship[@{{ internship.id }}][company_type]">&nbsp;Startup&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="mnc" name="internship[@{{ internship.id }}][company_type]">&nbsp;MNC&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="ngo" name="internship[@{{ internship.id }}][company_type]">&nbsp;NGO&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="other" name="internship[@{{ internship.id }}][company_type]">&nbsp;Other&nbsp;</label>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="" class="control-label">Duration of Internship</label>
                                      <div class="clearfix">
                                        <label for="" class="control-label"><input type="radio" value="any" name="internship[@{{ internship.id }}][duration]">&nbsp;Any&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="0_3" name="internship[@{{ internship.id }}][duration]">&nbsp;0-3 Months&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="3_6" name="internship[@{{ internship.id }}][duration]">&nbsp;3-6 Months&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="6_9" name="internship[@{{ internship.id }}][duration]">&nbsp;6-9 Months&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="9_12" name="internship[@{{ internship.id }}][duration]">&nbsp;9-12 Months&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="1_year_plus" name="internship[@{{ internship.id }}][duration]">&nbsp;1 Year +&nbsp;</label>
                                      </div>
                                    </div>
                                    <!-- City of Internship -->
                                    <div class="form-group"><label for="" class="control-label">City of Internship</label>
                                      <div class="clearfix">
                                        <div class="form-group"><input type="text" class="form-control" name="internship[@{{ internship.id }}][city][0]" placeholder="Preferable city"></div>
                                        <div class="form-group"><input type="text" class="form-control" name="internship[@{{ internship.id }}][city][1]" placeholder="Preferable city (optional)"></div>
                                        <div class="form-group"><input type="text" class="form-control" name="internship[@{{ internship.id }}][city][2]" placeholder="Preferable city (optional)"></div>
                                      </div>
                                    </div>
                                    <!-- eof city of internship -->
                                    <!-- Available from -->
                                    <div class="form-group">
                                      <label for="" class="control-label">Available (From - To)</label>
                                      <div class="clearfix">
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-6">
                                            <vue-datetime-picker class="vue-start-picker" :vid="internship.id" name="from_date" prefix="internship"
                                                                 v-ref:start-picker
                                                                 :model.sync="startDatetime"
                                                                 :on-change="onStartDatetimeChanged">
                                            </vue-datetime-picker>
                                          </div>
                                          <div class="col-xs-12 col-sm-6">
                                            <vue-datetime-picker class="vue-end-picker" :vid="internship.id" name="to_date" prefix="internship"
                                                                 v-ref:end-picker
                                                                 :model.sync="endDatetime"
                                                                 :on-change="onEndDatetimeChanged">
                                            </vue-datetime-picker>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- eof available from -->

                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <!-- Type of internship -->
                                    <div class="form-group">
                                      <label for="" class="control-label">Internship type</label>
                                      <div class="clearfix">
                                        <label for="" class="control-label"><input type="radio" value="any" name="internship[@{{ internship.id }}][internship_type]">&nbsp;Any&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="full_time_office" name="internship[@{{ internship.id }}][internship_type]">&nbsp;Full Time (In Office)&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="part_time_office" name="internship[@{{ internship.id }}][internship_type]">&nbsp;Part Time (In Office)&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="full_time_home" name="internship[@{{ internship.id }}][internship_type]">&nbsp;Work from Home (Full time)&nbsp;</label>
                                        <label for="" class="control-label"><input type="radio" value="part_time_home" name="internship[@{{ internship.id }}][internship_type]">&nbsp;Work from Home (Part time)&nbsp;</label>
                                      </div>
                                    </div>
                                    <!-- eof type of internship -->
                                    <!-- Expected Stipend -->
                                    <div class="form-group"><label for="" class="control-label">Expected
                                        Stipend</label>
                                      <div class="clearfix">
                                        <div class="row">
                                          <div class="col-xs-12 col-sm-6">
                                            <div class="form-group"><input type="text" class="form-control" placeholder="Stipend from" value=""
                                                                           name="internship[@{{ internship.id }}][stipend_from]"></div>
                                          </div>
                                          <div class="col-xs-12 col-sm-6">
                                            <div class="form-group"><input type="text" class="form-control" placeholder="Stipend to" value=""
                                                                           name="internship[@{{ internship.id }}][stipend_to]"></div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end expected stipend -->
                                    <!-- Skill Available -->
                                    <div class="form-group">
                                      <label for="" class="control-label">Select Skills</label>
                                      <div class="clearfix">
                                        <div class="well" v-if="internship.skills.length > 0">
                                          <label for="" v-for="skill in internship.skills" id="@{{ skill.id }}">
                                            <input type="checkbox" value="@{{ skill.id }}" v-on:click="addSkillToField(skill, $parent.$index, $event)"> @{{ skill.name }}
                                          </label>
                                        </div>
                                        <ul class="list-group" v-if="internship.mySkills.length > 0">
                                          <li class="list-group-item clearfix" v-for="skill in internship.mySkills">
                                            @{{ skill.name }}
                                            <div class="pull-right">
                                              <input type="radio" name="internship[@{{ internship.id }}][skill][@{{ skill.id }}]" value="beginner">&nbsp;Beginner&nbsp;
                                              <input type="radio" name="internship[@{{ internship.id }}][skill][@{{ skill.id }}]" value="intermediate">&nbsp;Intermediate&nbsp;
                                              <input type="radio" name="internship[@{{ internship.id }}][skill][@{{ skill.id }}]" value="expert">&nbsp;Expert&nbsp;
                                            </div>
                                          </li>
                                        </ul>
                                        <div class="alert alert-warning" v-if="!(internship.skills.length > 0)">
                                          Sorry We don't find any skills with this Internship field
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end skill available -->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group text-right">
                        <button class="btn" type="submit">Continue</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed clearfix" role="button" data-toggle="collapse" data-parent="#accordion" href="#qualificationInfoCollapse" aria-expanded="false" aria-controls="collapseTwo">
                      Qualification Preferences
                      <span class="glyphicon glyphicon-education pull-right"></span>
                    </a>
                  </h4>
                </div>
                <div id="qualificationInfoCollapse" class="panel-collapse collapse">
                  <div class="panel-body">
                    <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
                      {{csrf_field()}}
                      {{method_field('POST')}}
                      <div class="row">
                        <div class="col-xs-12 col-sm-4 col-lg-3">
                          <ul class="list-group form-list">
                            <li class="list-group-item active"><a href="#10_th" data-toggle="tab">10<sup>th</sup> Standard</a></li>
                            <li class="list-group-item"><a href="#12_th" data-toggle="tab">12<sup>th</sup> Standard</a></li>
                            <li class="list-group-item"><a href="#graduation" data-toggle="tab">Graduation</a></li>
                            <li class="list-group-item"><a href="#post_graduation" data-toggle="tab">Post Graduation</a></li>
                            <li class="list-group-item"><a href="#diploma" data-toggle="tab">Diploma</a></li>
                            <li class="list-group-item"><a href="#phd" data-toggle="tab">PhD</a></li>
                            <li class="list-group-item"><a href="#academic" data-toggle="tab">Academic</a></li>
                            <li class="list-group-item"><a href="#sports" data-toggle="tab">Sports</a></li>
                            <li class="list-group-item"><a href="#arts" data-toggle="tab">Arts</a></li>
                            <li class="list-group-item"><a href="#other" data-toggle="tab">Other</a></li>
                          </ul>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-lg-9">
                          <div class="tab-content">
                            @include('register.student._qualification_fields')
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-xs-12 text-right">
                          <button type="submit" class="btn">Continue</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                </div>

              <!-- Experience Section -->
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                  <h4 class="panel-title">
                    <a class="collapsed clearfix" role="button" data-toggle="collapse" data-parent="#accordion" href="#experienceInfoCollapse" aria-expanded="false" aria-controls="collapseTwo">
                      Experience Preferences
                      <span class="glyphicon glyphicon-blackboard pull-right"></span>
                    </a>
                  </h4>
                </div>
                <div id="experienceInfoCollapse" class="panel-collapse collapse">
                    <div class="panel-body">
                      <form action="{{route('save_student_experience_data')}}" method="post" id="internship-experience-form">
                        {{csrf_field()}}
                        {{method_field('POST')}}
                        <div class="row">
                          <div class="col-xs-12 col-sm-4 col-lg-3">
                            <ul class="list-group form-list">
                              <li class="list-group-item active"><a href="#exp-internship" data-toggle="tab">Internship</a></li>
                              <li class="list-group-item"><a href="#exp-job" data-toggle="tab">Job</a></li>
                              <li class="list-group-item"><a href="#exp-project" data-toggle="tab">Project</a></li>
                              <li class="list-group-item"><a href="#exp-freelancer" data-toggle="tab">Freelancer</a></li>
                              <li class="list-group-item"><a href="#exp-training" data-toggle="tab">Training</a></li>
                              <li class="list-group-item"><a href="#exp-other" data-toggle="tab">Other</a></li>
                            </ul>
                          </div>
                          <div class="col-xs-12 col-sm-8 col-lg-9">
                            <div class="tab-content">
                              @include('register.student._experience_fields')
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-xs-12 text-right">
                            <button class="btn" type="submit">Continue</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              <!-- end expereince section -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('extra_js')
  <script type="text/javascript" src="{{asset('js/vue.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/main-vue.min.js')}}"></script>
@stop