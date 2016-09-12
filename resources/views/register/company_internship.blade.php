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
                        <select name="internship[field]" id="" class="form-control select-2-select">
                          @foreach($internship_fields as $field)
                            <option value="{{$field['id']}}">{{$field['name']}}</option>
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
                        <label for="" class="control-label">Minimum Eligibility</label>
                        <div class="clearfix">
                          <label for="" class="control-label"><input type="radio">&nbsp;Any&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;10 <sup>th</sup>&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;12 <sup>th</sup>&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;Graduation&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;Post Graduation&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;Diploma&nbsp;</label>
                          <label for="" class="control-label"><input type="radio">&nbsp;PhD&nbsp;</label>
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