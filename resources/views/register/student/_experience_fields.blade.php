<div role="tabpanel" class="tab-pane active" id="exp-internship">
  <div class="page-header"><h4>Internship</h4></div>
  <div id="vue-experience-internship">
    <div class="row">
      <div class="col-xs-12">
        <label for="">Number of Internship</label>
        <select name="" id="" v-on:change="addMoreInternship($event)" class="form-control">
          <option value="">Select</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
    </div>
    <div class="experience-internship-list" v-for="experience in internshipList">
      <h5>Internship @{{ experience + 1}}</h5>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group"><label for="" class="control-label">Company Name</label>
            <input type="text" class="form-control" placeholder="Company Name" name="experience[internship][@{{ $index }}][company_name]">
          </div>
          <div class="form-group"><label for="internship-field-selector" class="control-label">Type Of Job</label>
            @if(isset($get_fields))
              <select name="experience[internship][@{{ $index }}][internship_field_id]" id="internship-field-selector" class="form-control">
                @foreach($get_fields as $field)
                  <option value="{{$field['id']}}" data-name="{{$field['name']}}">{{$field['name']}}</option>
                @endforeach
              </select>
            @endif
          </div>
          <label for="" class="control-label">Work Type</label>
          <div class="clearfix">
            <label for="" class="control-label"><input type="radio" name="experience[internship][@{{ $index }}][work_type]"
                                                       value="any">&nbsp;Any&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[internship][@{{ $index }}][work_type]"
                                                       value="full_time_office">&nbsp;Full Time (office)&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[internship][@{{ $index }}][work_type]"
                                                       value="part_time_office">&nbsp;Part Time (office)&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[internship][@{{ $index }}][work_type]"
                                                       value="full_time_home">&nbsp;Work from Home (Full time)&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[internship][@{{ $index }}][work_type]"
                                                       value="part_time_office">&nbsp;Work from Home (Part time)&nbsp;</label>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group"><label for="" class="control-label">Total Time</label>
          <div class="clearfix">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <vue-datetime-picker class="vue-end-picker" :vid="$index" name="work_from" prefix="experience[internship]"
                     v-ref:end-picker
                     :model.sync="endDatetime"
                     :on-change="onEndDatetimeChanged">
                </vue-datetime-picker>
              </div>
              <div class="col-xs-12 col-sm-6">
                <vue-datetime-picker class="vue-end-picker" :vid="$index" name="work_to" prefix="experience[internship]"
                   v-ref:end-picker
                   :model.sync="endDatetime"
                   :on-change="onEndDatetimeChanged">
                </vue-datetime-picker>
              </div>
            </div>
          </div>
          </div>
          <div class="form-group"><label for="" class="control-label">Stipend</label>
            <p>
              Applicant receive stipend
              <label for=""><input type="checkbox" name="experience[internship][@{{ $index }}][stipend]"></label>
            </p>
          </div>
          <div class="form-group">
            <label for="" class="control-label">Job Description</label>
            <textarea name="experience[internship][@{{ $index }}][job_description]" id="" cols="30" rows="4"
                      class="form-control" placeholder="Job description"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="exp-job">
  <div class="page-header"><h4>Job</h4></div>
  <div id="vue-experience-job">
    <div class="row">
      <div class="col-xs-12">
        <label for="">Number of Job</label>
        <select name="" id="" v-on:change="addMoreInternship($event)" class="form-control">
          <option value="">Select</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
    </div>
    <div class="experience-internship-list" v-for="experience in internshipList">
      <h5>Job @{{ experience + 1}}</h5>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group"><label for="" class="control-label">Company Name</label>
            <input type="text" class="form-control" placeholder="Company Name" name="experience[job][@{{ $index }}][company_name]">
          </div>
          <div class="form-group"><label for="internship-field-selector" class="control-label">Type Of Job</label>
            @if(isset($get_fields))
              <select name="experience[job][@{{ $index }}][internship_field_id]" id="internship-field-selector" class="form-control">
                @foreach($get_fields as $field)
                  <option value="{{$field['id']}}" data-name="{{$field['name']}}">{{$field['name']}}</option>
                @endforeach
              </select>
            @endif
          </div>
          <label for="" class="control-label">Work Type</label>
          <div class="clearfix">
            <label for="" class="control-label"><input type="radio" name="experience[job][@{{ $index }}][work_type]"
                                                       value="any">&nbsp;Any&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[job][@{{ $index }}][work_type]"
                                                       value="full_time_office">&nbsp;Full Time (office)&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[job][@{{ $index }}][work_type]"
                                                       value="part_time_office">&nbsp;Part Time (office)&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[job][@{{ $index }}][work_type]"
                                                       value="full_time_home">&nbsp;Work from Home (Full time)&nbsp;</label>
            <label for="" class="control-label"><input type="radio" name="experience[job][@{{ $index }}][work_type]"
                                                       value="part_time_office">&nbsp;Work from Home (Part time)&nbsp;</label>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group"><label for="" class="control-label">Total Time</label>
            <div class="clearfix">
              <div class="row">
                <div class="col-xs-12 col-sm-6">
                  <vue-datetime-picker class="vue-end-picker" :vid="$index" name="work_from" prefix="experience[job]"
                                       v-ref:end-picker
                                       :model.sync="endDatetime"
                                       :on-change="onEndDatetimeChanged">
                  </vue-datetime-picker>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <vue-datetime-picker class="vue-end-picker" :vid="$index" name="work_to" prefix="experience[job]"
                                       v-ref:end-picker
                                       :model.sync="endDatetime"
                                       :on-change="onEndDatetimeChanged">
                  </vue-datetime-picker>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group"><label for="" class="control-label">Stipend</label>
            <p>
              Applicant receive stipend
              <label for=""><input type="checkbox" name="experience[job][@{{ $index }}][stipend]"></label>
            </p>
          </div>
          <div class="form-group">
            <label for="" class="control-label">Job Description</label>
            <textarea name="experience[job][@{{ $index }}][job_description]" id="" cols="30" rows="4"
                      class="form-control" placeholder="Job description"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="exp-project">
  <div class="page-header"><h4>Project</h4></div>
  <div class="clearfix">
    <div class="form-group">
      <label for="" class="control-label">Title</label>
      <input type="text" class="form-control" name="experience[project][title]" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Description</label>
      <textarea name="experience[project][description]" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="" class="control-label">Organization</label>
      <input type="text" class="form-control" name="experience[project][organization]">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Location</label>
      <input type="text" class="form-control" name="experience[project][location]">
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="exp-freelancer">
  <div class="page-header"><h4>Freelance</h4></div>
  <div class="clearfix">
    <div class="form-group">
      <label for="" class="control-label">Title</label>
      <input type="text" class="form-control" name="experience[freelance][title]" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Description</label>
      <textarea name="experience[freelance][job_description]" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="" class="control-label">Organization</label>
      <input type="text" class="form-control" name="experience[freelance][organization]">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Location</label>
      <input type="text" class="form-control" name="experience[freelance][location]">
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="exp-training">
  <div class="page-header"><h4>Training</h4></div>
  <div class="clearfix">
    <div class="form-group">
      <label for="" class="control-label">Title</label>
      <input type="text" class="form-control" name="experience[training][title]" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Description</label>
      <textarea name="experience[training][job_description]" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="" class="control-label">Organization</label>
      <input type="text" class="form-control" name="experience[training][organization]">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Location</label>
      <input type="text" class="form-control" name="experience[training][location]">
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="exp-other">
  <div class="page-header"><h4>Other</h4></div>
  <div class="clearfix">
    <div class="form-group">
      <label for="" class="control-label">Title</label>
      <input type="text" class="form-control" name="experience[other][title]" placeholder="Title">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Description</label>
      <textarea name="experience[other][job_description]" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
    </div>
    <div class="form-group">
      <label for="" class="control-label">Organization</label>
      <input type="text" class="form-control" name="experience[other][organization]" placeholder="Organization">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Location</label>
      <input type="text" class="form-control" name="experience[other][location]" placeholder="Location">
    </div>
  </div>
</div>