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
                              <option value="1">State 1</option>
                              <option value="2">State 2</option>
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
                                    <option value="">State 1</option>
                                    <option value="">State 2</option>
                                    <option value="">State 3</option>
                                    <option value="">State 4</option>
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
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#internshipInfoCollapse" aria-expanded="false" aria-controls="collapseTwo">
                      Internship Preferences
                      <span class="glyphicon glyphicon-blackboard"></span>
                    </a>
                  </h4>
                </div>
                <div id="internshipInfoCollapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">
                    <form action="" method="POST" id="internship_info_form">
                      {{csrf_field()}}
                      <div class="form-horizontal">
                        <div class="form-group">
                          <label for="type-of-company-fields" class="col-xs-12 col-sm-4 col-md-3 control-label text-left">
                            Type of Company
                            <br>
                            <small>tick against box</small>
                          </label>
                          <div class="col-xs-12 col-sm-8 col-md-9">
                            <div class="clearfix" id="type-of-company-fields">
                              <p>
                                <label for="type-any"><input name="type_of_company" type="radio" value="any" id="type-any" data-parsley-multiple=""
                                                                 required=""  data-parsley-errors-container="#type-of-company-error"
                                                                 data-parsley-required-message="Please check at least one duration.">&nbsp;Any</label>
                                &nbsp;<label for="type-startup"><input name="type_of_company" type="radio" value="startup" id="type-startup" data-parsley-multiple="">&nbsp;StartUp</label>
                                &nbsp;<label for="type-mnc"><input name="type_of_company" type="radio" value="mnc" id="type-mnc" data-parsley-multiple="">&nbsp;MNC</label>
                                &nbsp;<label for="type-ngo"><input name="type_of_company" type="radio" value="ngo" id="type-ngo" data-parsley-multiple="">&nbsp;NGO</label>
                                &nbsp;<label for="type-other"><input name="type_of_company" type="radio" value="other" id="type-other" data-parsley-multiple="">&nbsp;Other</label>
                              </p>
                            </div>
                            <div id="type-of-company-error">

                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="duration-fields" class="col-xs-12 col-sm-4 col-md-3 control-label text-left">
                            Duration (Year +)
                            <br>
                            <small>tick against the box</small>
                          </label>
                          <div class="col-xs-12 col-sm-8 col-md-9">
                            <div class="clearfix" id="duration-fields">
                              <p>
                                <label for="type-0"><input name="duration" type="radio" value="any" id="type-0" data-parsley-multiple=""
                                                                 required=""  data-parsley-errors-container="#duration-error"
                                                                 data-parsley-required-message="Please check  Duration.">&nbsp; Any</label>
                                &nbsp;<label for="type-3-6"><input name="duration" type="radio" value="3-6" id="type-3-6" data-parsley-multiple="">&nbsp;3-6 Months</label>
                                &nbsp;<label for="type-6-9"><input name="duration" type="radio" value="6-9" id="type-6-9" data-parsley-multiple="">&nbsp;6-9 Months</label>
                                &nbsp;<label for="type-9-12"><input name="duration" type="radio" value="9-12" id="type-9-12" data-parsley-multiple="">&nbsp;9-12 Months</label>
                              </p>
                            </div>
                            <div id="duration-error">

                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-xs-12 col-sm-4 col-md-3 control-label text-left">Available From</label>
                          <div class="col-xs-12 col-sm-8 col-md-9">
                            <div class="form-inline">
                              <div class="form-group">
                                <label for="date-from">From</label>
                                <input type="text" class="form-control date-from" id="date-from-1" data-to="#date-to-1" placeholder="Date from" required>
                              </div>
                              <div class="form-group">
                                <label for="date-to">To</label>
                                <input type="email" class="form-control date-to" id="date-to-1" placeholder="Date to" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Type Of Internship !-->
                        <div class="form-group"><label for=""
                                                       class="col-xs-12 col-sm-4 col-md-3 control-label text-left">Type
                            of Internship</label>
                          <div class="col-xs-12 col-sm-8 col-md-9">
                            <p>
                              <label for="type-internship-any"><input name="type_of_internship" type="radio" value="any" id="type-internship-any" data-parsley-multiple=""
                                                         required=""  data-parsley-errors-container="#duration-error"
                                                         data-parsley-required-message="Please check type of internship.">&nbsp; Any</label>
                              &nbsp;<label for="type-internship-full-time-office"><input name="type_of_internship" type="radio"
                                                                                         value="full_time_office" id="type-internship-full-time-office" data-parsley-multiple="">&nbsp;Full Time (in office)</label>
                              &nbsp;<label for="type-internship-part-time-office"><input name="type_of_internship" type="radio"
                                                                                         value="part_time_office" id="type-internship-part-time-office" data-parsley-multiple="">&nbsp;Part time (in office)</label>
                              &nbsp;<label for="type-internship-full-time-home"><input name="type_of_internship" type="radio"
                                                                                       value="full_time_home" id="type-internship-full-time-home" data-parsley-multiple="">&nbsp;Work from Home (full time)</label>
                              &nbsp;<label for="type-internship-part-time-home"><input name="type_of_internship" type="radio"
                                                                                       value="part_time_home" id="type-internship-part-time-home" data-parsley-multiple="">&nbsp;Work from Home (part time)</label>
                            </p>
                          </div>
                        </div>
                        <!-- EOF Type of Internship -->
                      </div>
                      <div class="form-group text-right">
                        <button class="btn" type="submit">Save</button>
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
  </div>
@stop