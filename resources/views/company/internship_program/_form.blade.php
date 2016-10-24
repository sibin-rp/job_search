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
    {{csrf_field()}}
    <div class="">
        <div class="row">
            <div class="col-md-6">

                <div class="form-group"><label for="internship-field">Field of internship</label>
                    <select class="form-control" id="internship-field" name="internship[internship_field_id]" data-url="{{route('api_get_skills_by_id')}}">
                        <option value="">Select</option>
                        @foreach($internship_fields as $field)
                            <option value="{{$field->id}}" @if($internship->internship_field_id == $field->id) selected="selected" @endif>{{$field->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Company</label>
                    <select name="internship[company_id]" id="" class="form-control">
                        @foreach($companies as $comapany)
                            <option value="{{$comapany->id}}">{{$comapany->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="comment">Description</label>
                    <textarea class="form-control" rows="5" placeholder="Job Description" id="comment" name="internship[description]">{{$internship->description}}</textarea>
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

                <div class="form-group">
                    <label for="">Duration</label>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" value="any" name="internship[duration]" @if($internship->duration=="any") checked="checked" @endif>Any&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="0_3" name="internship[duration]" @if($internship->duration=="0_3") checked="checked" @endif>0-3months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="3_6" name="internship[duration]" @if($internship->duration=="3_6") checked="checked" @endif>3-6months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="6_9" name="internship[duration]" @if($internship->duration=="6_9") checked="checked" @endif>6-9months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="9_12" name="internship[duration]" @if($internship->duration=="9_12") checked="checked" @endif>9-12months&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" value="1+_year" name="internship[duration]" @if($internship->duration=="1+_year") checked="checked" @endif>1 year+&nbsp;</label>
                    </div>
                </div>
                <div class="form-group">
                <label>Or Select Date</label>
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
                    <input type="text" required="required" class="form-control" placeholder="Job Title" name="internship[title]">
                </div>

                <div class="form-group qualification-fields">
                    <label for="">Minimum Qualification</label>
                    <div class="min-qual">
                        <div class="clearfix">
                            <label for="">&nbsp; <input type="radio" class="min_qual_radio" name="internship[min_qualification]" checked="checked" value="any">Any&nbsp;</label>
                            <label for="">&nbsp; <input type="radio" class="min_qual_radio" name="internship[min_qualification]" value="10_th">10th&nbsp;</label>
                            <label for="">&nbsp; <input type="radio" class="min_qual_radio" name="internship[min_qualification]" value="12_th">12th&nbsp;</label>
                            <label for="">&nbsp; <input type="radio" class="min_qual_radio" name="internship[min_qualification]" value="graduation">Graduation&nbsp;</label>
                            <label for="">&nbsp; <input type="radio" class="min_qual_radio" name="internship[min_qualification]" value="post_graduation">PG&nbsp;</label>
                            <label for="">&nbsp; <input type="radio" class="min_qual_radio" name="internship[min_qualification]" value="diploma">Diploma&nbsp;</label>
                            <label for="">&nbsp; <input type="radio" class="min_qual_radio" name="internship[min_qualification]" value="phd">Phd&nbsp;</label>
                        </div>
                        <div class="min-qualification-form">
                            <!-- 10th standard -->
                            <div class="qualification-section" id="quali-10_th">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        10th Standard
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Scale</label>
                                                    <select name="" id="" class="q-type form-control">
                                                        <option value="cgpa_4">CGPA 4</option>
                                                        <option value="cgpa_10">CGPA 10</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Mark</label>
                                                    <input type="number" class="form-control q-mark" placeholder="Mark" step="0.01"  min="0" max="4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end 10th standard -->

                            <!-- 12th standard -->
                            <div class="qualification-section" id="quali-12_th">
                                <div class="panel panel-default">
                                    <div class="panel-heading">12th Standard</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="">Stream</label>
                                                    <select name="" id="" data-qualify="12_th" class="form-control">
                                                        <option value="">Select
                                                        @if(isset($qualifications['12_th']))
                                                            @foreach($qualifications['12_th'] as $qualification)
                                                                <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Scale</label>
                                                    <select name="" id="" class="q-type form-control">
                                                        <option value="cgpa_4">CGPA 4</option>
                                                        <option value="cgpa_10">CGPA 10</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Mark</label>
                                                    <input type="number" class="form-control q-mark" placeholder="Mark" step="0.01"  min="0" max="4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- end 12th standard -->

                            <!-- Graduation -->
                            <div class="qualification-section" id="quali-graduation">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Graduation
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Degree</label>
                                                    <select  name="" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        @if(isset($qualifications['graduation']))
                                                            @php
                                                                $g_degree_qualifications = array_where($qualifications['graduation'], function($value){
                                                                    return $value['type'] == "Degree";
                                                                })
                                                            @endphp

                                                            @foreach($g_degree_qualifications as $qualification)
                                                                <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Stream</label>
                                                    <select  name="" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        @if(isset($qualifications['graduation']))
                                                            @php
                                                                $s_degree_qualifications = array_where($qualifications['graduation'], function($value){
                                                                    return $value['type'] == "Stream";
                                                                })
                                                            @endphp

                                                            @foreach($s_degree_qualifications as $qualification)
                                                                <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Scale</label>
                                                    <select name="" id="" class="q-type form-control">
                                                        <option value="cgpa_4">CGPA 4</option>
                                                        <option value="cgpa_10">CGPA 10</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Mark</label>
                                                    <input type="number" class="form-control q-mark" placeholder="Mark" step="0.01"  min="0" max="4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end graduation -->

                            <!-- Post graduation -->
                            <div class="qualification-section" id="quali-post_graduation">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Post Graduation
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Degree</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        @if($qualifications['post_graduation'])
                                                            @foreach($qualifications['post_graduation'] as $qualification)
                                                                <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Scale</label>
                                                    <select name="" id="" class="q-type form-control">
                                                        <option value="cgpa_4">CGPA 4</option>
                                                        <option value="cgpa_10">CGPA 10</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Mark</label>
                                                    <input type="number" class="form-control q-mark" placeholder="Mark" step="0.01"  min="0" max="4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end post graduation -->

                            <!-- Diploma -->
                            <div class="qualification-section" id="quali-diploma">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Diploma
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Stream</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        @if(isset($qualifications['diploma']))
                                                            @foreach($qualifications['diploma'] as $qualification)
                                                                <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Scale</label>
                                                    <select name="" id="" class="q-type form-control">
                                                        <option value="cgpa_4">CGPA 4</option>
                                                        <option value="cgpa_10">CGPA 10</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Mark</label>
                                                    <input type="number" class="form-control q-mark" placeholder="Mark" step="0.01"  min="0" max="4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end diploma -->

                            <!-- Phd -->
                            <div class="qualification-section" id="quali-phd">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        PHD
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Stream</label>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        @if(isset($qualifications['phd']))
                                                            @foreach($qualifications['phd'] as $qualification)
                                                                <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Scale</label>
                                                    <select name="" id="" class="q-type form-control">
                                                        <option value="cgpa_4">CGPA 4</option>
                                                        <option value="cgpa_10">CGPA 10</option>
                                                        <option value="percentage">Percentage</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-7">
                                                <div class="form-group">
                                                    <label for="" class="control-label">Mark</label>
                                                    <input type="number" class="form-control q-mark" placeholder="Mark" step="0.01" min="0" max="4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Phd -->

                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="sel1">Eligibility</label>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <select class="form-control" name="internship[eligible_min]">
                                <option value="">Minimum age</option>
                                @for($i=15;$i<45;$i++)
                                    <option value="{{$i}}" @if($internship->eligible_min==$i) @endif >{{$i}}</option>
                                @endfor
                            </select>

                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <select class="form-control" name="internship[eligible_max]">
                                <option value="">Maximum age</option>
                                @for($i=15;$i<45;$i++)
                                    <option value="{{$i}}" @if($internship->eligible_max == $i) selected="selected" @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Type of internship</label>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" name="internship[type]" value="any">Any&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" name="internship[type]" value="full_time_office">Full Time(office)&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" name="internship[type]" value="part_time_office">Part Time(office)&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" name="internship[type]" value="full_time_home">Work From Home(Full Time&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" name="internship[type]" value="part_time_home">Work From Home(Part Time)&nbsp;</label>

                    </div>
                </div>
                <div class="form-group">
                    <label class="font">Number of resumes to be sent in a single round</label>
                    <select class="form-control"  name="internship[num_resume]">
                        @for($i=1;$i<10;$i++)
                            <option value="{{$i*5}}">{{$i*5}} Resumes</option>
                        @endfor
                    </select>
                </div>


                <div class="form-group">
                    <div class="form-group">
                        <label for="">Skills Required </label>
                        <div class="alert alert-info" id="skill-info-box">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Please select Internship field</div>
                        <div class="skills-box hidden">
                            <p>
                                Choose Skills from Below
                            </p>
                            <div class="well" id="skill-well">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Payment to intern</label>

                    <div class="clearfix">
                        <label for="">&nbsp; <input type="radio" name="internship[payment]" value="weekly">Weekly&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" name="internship[payment]" value="fornightly">Fornightly&nbsp;</label>
                        <label for="">&nbsp; <input type="radio" name="internship[payment]" value="monthly">Monthly&nbsp;</label>


                    </div>
                </div>

                <div class="form-group"><label>Validity of Internship</label>
                    <input type="text" required="required" class="form-control common-date-picker"
                           value="{{$internship->validity}}"
                           placeholder="Validity of Internship" name="internship[validity]">
                </div>


            </div>


        </div>


    </div>
   <hr size="5">
    <div class="btn pull-right">
        <button type="submit" class="btn btn-primary">Complete Registration</button>
    </div>

    </div>



<!-- end form -->