@extends('layouts.home')
@section('content')
  <div class="company-info-register">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="">Add Internship</h3>
              </div>
              <div class="panel-body">
                <form action="" method="post">
                  {{csrf_field()}}
                  {{method_field('POST')}}
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">Field of Internship</label>
                        <select name="internship[field]" id="internship-field" class="form-control select-2-select" data-url="{{route('api_get_skills_by_id')}}">

                          @foreach($internship_fields as $field)
                            <option value="{{$field['id']}}" @if($loop->index == 0) selected="selected" @endif>{{$field['name']}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Job Title</label>
                        <input type="text" name="internship[]" class="form-control" placeholder="Job Title">
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Description</label>
                        <textarea name="internship[description]" id="" cols="30" rows="5" class="form-control" placeholder="Joob description"></textarea>
                      </div>
                      <div class="form-group"><label for="" class="control-label">Stipend <small>(From - To (In Rupees))</small></label>
                        <div class="div clearfix">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                              <select name="internship[stipend_from]" id="" class="form-control">
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
                              <select name="internship[stipend_to]" id="" class="form-control">
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
                            <label for=""><input type="radio" name="internship[duration]">&nbsp;Any</label>
                            <label for="">&nbsp;<input type="radio" name="internship[duration]">&nbsp;0-3 Month</label>
                            <label for="">&nbsp;<input type="radio" name="internship[duration]">&nbsp;3-6 Month</label>
                            <label for="">nbsp;<input type="radio" name="internship[duration]">&nbsp;6-9 Month&</label>
                            <label for="">&nbsp;<input type="radio" name="internship[duration]">&nbsp;9-12 Month</label>
                            <label for="">&nbsp;<input type="radio" name="internship[duration]">&nbsp;1 Year +</label>
                          </p>
                          <p>
                            Or Select Date
                          </p>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6"><input name="internship[duration_start]" type="text" class="form-control internship-duration" id="internship-duration-start" placeholder="Duration start"></div>
                            <div class="col-xs-12 col-sm-6"><input name="internship[duration_end]" type="text" class="form-control internship-duration" id="internship-duration-end" placeholder="Duration end"></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Type Of Internship</label>
                        <div class="clearfix">
                          <p>
                            <label for="" class="control-label"><input type="radio" name="internship[type]" value="any">&nbsp;Any&nbsp;</label>
                            <label for="" class="control-label"><input type="radio" name="internship[type]" value="full_time_office">Full Time (Office)&nbsp;</label>
                            <label for="" class="control-label"><input type="radio" name="internship[type]" value="part_time_office">&nbsp;Part Time (Office)&nbsp;</label>
                            <label for="" class="control-label"><input type="radio" name="internship[type]" value="full_time_home">&nbsp;Work from Home (Full time)&nbsp;</label>
                            <label for="" class="control-label"><input type="radio" name="internship[type]" value="part_time_home">&nbsp;Work from Home (Part time)&nbsp;</label>
                          </p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Location Of Internship</label>
                        <div class="clearfix">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6"><p>City</p>
                            <p>
                              <input type="text" class="form-control" name="internship[city]" placeholder="Internship City">
                            </p></div>
                            <div class="col-xs-12 col-sm-6"><p>State</p>
                              <p>
                                <select name="internship[state]" id="internship-state" class="form-control">
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
                      <div class="form-group">
                        <label for="" class="control-label">Minimum Qualification</label>
                        <div class="clearfix">
                          <label for="" class="control-label"><input type="radio">&nbsp;Any&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;10 <sup>th</sup>&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;12 <sup>th</sup>&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;Graduation&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;Post Graduation&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;Diploma&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;PhD&nbsp;</label>
                        </div>
                        <div class="clearfix">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Degree
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                  <div class="form-group">
                                    <label for="">Degree</label>
                                    <select name="" id="" class="form-control">
                                      <option value=""></option>
                                      <option value=""></option>
                                      <option value=""></option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Stream
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                  <div class="form-group">
                                    <label for="">Stream</label>
                                    <select name="" id="" class="form-control">
                                      <option value=""></option>
                                      <option value=""></option>
                                      <option value=""></option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Performance
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                  <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                      <label for="">Choose</label>
                                      <select name="" id="" class="form-control">
                                        <option value="">CGPA</option>
                                        <option value="">Percentage</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Eligibility</label>
                        <div class="clearfix">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6">
                              <div class="form-group"><input type="number" class="form-control" name="internship[eligible_min]" min="15" max="40" placeholder="Minimum eligibility Age"></div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                              <div class="form-group"><input type="number" class="form-control" name="internship[eligible_max]" min="15" max="40" placeholder="Maximum eligibilty Age"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Skills Required</label>
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
                        <select name="internship[num_resume]" id="" class="form-control">
                          @for($i=1;$i<10;$i++)
                            <option value="{{$i*5}}">{{$i*5}} Resumes</option>
                          @endfor
                        </select>
                      </div>
                      <div class="form-group">
                        <p>Pre Recruitment exercise for intern</p>
                        <p>
                          <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="none">&nbsp;None&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="sample_work">&nbsp;Sample Work&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="telephone_interview">&nbsp;Telephone Interview&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="one_on_one_interview">&nbsp;One to One Interview&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="video_interview">&nbsp;Video Interview&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="chat">&nbsp;Chat&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="other">&nbsp;Other&nbsp;</label>
                        </p>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <p>Payment to Intern</p>
                        <p>
                          <label for="" class="control-label"><input type="radio" name="internship[payment]" value="weekly">&nbsp;Weekly&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[payment]" value="fortnightly">&nbsp;Fortnighlty&nbsp;</label>
                          <label for="" class="control-label"><input type="radio" name="internship[payment]" value="monthly">&nbsp;Monthly&nbsp;</label>
                        </p>
                      </div>
                      <div class="form-group">
                        <p class="clearfix">
                          Validity of Internship
                          <a href="javascript:void(0)" class="pull-right" data-toggle="popover" data-placement="left" title="Validity of Internship"
                             data-content="The Organization must necessarily provide a certificate recognizing the concerned intern's
                              work and clearly stating the duration. If a certificate cannot be provided then the
                              organization must ensure to provide at least recognition of the work done one the
                              company's letter head.">
                            <span class="glyphicon glyphicon-info-sign"></span>
                          </a>
                        </p>
                        <p>
                          <input type="text" class="form-control date-picker" placeholder="Validity of Internship" value="">
                        </p>
                      </div>
                    </div>
                  </div>
                  <!-- END FURTHER DETAILS -->
                  <hr>
                  <div class="row">
                    <div class="col-xs-12 finish text-right">
                      <button type="submit" class="btn btn-success">Complete Registration</button>
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
@stop