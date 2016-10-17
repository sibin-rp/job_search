@php
  $default_option = [
    'internship_field_id' => null,
    'title' => null,
    'description' => null,
    'stipend_from' => null,
    'stipend_to' => null,
    'duration' => null,
    'type' => null,
    'city' => null,
    'state' => null,
    'eligible_min' => null,
    'eligible_max' => null,
    'num_resume' => null,
    'per_rec_exercise' => null,
    'payment' => null,
    'validity' => null
  ];

  if(isset($internship)){
    $default_option = array_merge($default_option,$internship->toArray());
  }
  $internship = (object) $default_option;

@endphp

<!-- Here You start form -->
<div class="form-fill">
    <div class="">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group"><label for="sel1">Field of internship</label>
                    <select class="form-control" id="sel1">
                        <option>Game Development</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comment">Description</label>
                    <textarea class="form-control" rows="5" placeholder="Job Description" id="comment" name="internship[title]">{{$internship->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="sel1">Stipend(From-To(In Rupees))</label>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <select class="form-control" id="stipend-from" name="internship[stipend_from]">
                                <option>1000</option>
                                <option>2000</option>
                                <option>3000</option>
                                <option>4000</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <select class="form-control" id="stipend-to" name="internship[stipend_to]">
                                <option>1000</option>
                                <option>2000</option>
                                <option>3000</option>
                                <option>4000</option>
                            </select>
                        </div>
                    </div>
                </div>


                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" value="any" name="internship[duration]" @if($internship->duration=="any") checked="checked" @endif>Any&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="0_3" name="internship[duration]" @if($internship->duration=="0_3") checked="checked" @endif>0-3months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="3_6" name="internship[duration]" @if($internship->duration=="3_6") checked="checked" @endif>3-6months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="6_9" name="internship[duration]" @if($internship->duration=="6_9") checked="checked" @endif>6-9months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="9_12" name="internship[duration]" @if($internship->duration=="9_12") checked="checked" @endif>9-12months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="1+_year" name="internship[duration]" @if($internship->duration=="1+_year") checked="checked" @endif>1 year+&nbsp;</label>
                    </div>
                <div class="form-group">
                <h6>Or Select Date</h6>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control common-date-picker" placeholder="Duration Start"  value="" name="internship[duration_start]">
                    </div>
                    <div class="col-md-6">
                        <input type="text" required="required" class="form-control common-date-picker" placeholder="Duration End" value="internship[duration_end]">
                    </div>
                </div>
                    </div>


                <div class="form-group"><label for="sel1">Location of internship</label>
                <div class="row">
                    <div class="col-md-6">
                        <h6>City</h6>
                        <input type="text" required="required" class="form-control" placeholder="Internship City" name="internship[city]" value="{{$internship->city}}">
                    </div>
                    <div class="col-md-6">
                        <h6>State</h6>
                        <select class="form-control" id="internship-state" name="internship[state]">
                          @foreach($states as $code => $state)
                            <option value="{{$code}}" @if($internship->state == $code) selected="selected" @endif>{{$state}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                </div>

                <div class="form-group">
                    <label>Pre Recruitment exercise for intern</label>

                    <div class="clearfix">
                        <label for="" class="control-label">&nbsp; <input type="radio" name="internship[pre_rec_exercise]" value="none">None&nbsp;</label>
                        <label for="" class="control-label">&nbsp; <input type="radio" name="internship[pre_rec_exercise]" value="sample_work">Sample Work&nbsp;</label>
                        <label for="" class="control-label">&nbsp; <input type="radio" name="internship[pre_rec_exercise]" value="telephone_interview">Telephone Interview&nbsp;</label>
                        <label for="" class="control-label">&nbsp; <input type="radio" name="internship[pre_rec_exercise]" value="one_to_one_interview">One to One Interview&nbsp;</label>
                      <label for="" class="control-label"><input type="radio" name="internship[pre_rec_exercise]" value="video_interview">&nbsp;Video Interview&nbsp;</label>
                      <label for="" class="control-label">&nbsp; <input type="radio" name="internship[pre_rec_exercise]" value="chat">Chat&nbsp;</label>
                        <label for="" class="control-label">&nbsp; <input type="radio" name="internship[pre_rec_exercise]" value="other">Other&nbsp;</label>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"><label for="" class="control-label">Job Title</label>
                    <input type="text" required="required" class="form-control" placeholder="Job Title" name="text">
                </div>

                <div class="form-group">
                    <label for="">Minimum Qualification</label>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" value="">Any&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">10th&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">12th&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Graduation&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">PG&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Phd&nbsp;</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sel1">Eligibility</label>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <select class="form-control" id="sel1">
                                <option>Minimum age</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>

                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <select class="form-control" id="sel1">
                                <option>Maximum age</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Type of internship</label>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" value="">Any&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Full Time(office)&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Part Time(office)&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Work From Home(Full Time&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Work From Home(Part Time)&nbsp;</label>

                    </div>
                </div>
                <div class="form-group">
                    <h6 class="font">Number of resumes to be sent in a single round</h6>
                    <select class="form-control" id="sel1">
                        <option>5 resumes</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="">Skills Required</label>
                    <h6>Choose skills from below</h6>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="checkbox" value="">Hitman&nbsp;</label>
                        <label for="">&nbsp; <input type="checkbox" value="">Games&nbsp;</label>
                        <label for="">&nbsp; <input type="checkbox" value="">COD&nbsp;</label>
                        <label for="">&nbsp; <input type="checkbox" value="">EA-Sports&nbsp;</label>
                        <label for="">&nbsp; <input type="checkbox" value="">Captain-America&nbsp;</label>

                    </div>
                </div>

                <div class="form-group">
                    <h6>Payment to intern</h6>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" value="">Weekly&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Fornightly&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="">Monthly&nbsp;</label>


                    </div>
                </div>

                <div class="form-group"><h6>Validity of Internship</h6>
                    <input type="text" required="required" class="form-control date-picker" placeholder="Validity of Internship" name="internship[validity]">
                </div>


            </div>


        </div>


    </div>
   <hr size="5">
    <div class="btn pull-right">
        <button type="button" class="btn btn-primary">Complete Registration</button>
    </div>

    </div>
</div>


<!-- end form -->