<div class="row">
  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Internship Field</label>
      <select name="experience[internship_field_id]" id="" class="form-control">
        <option value="">Select</option>
        @foreach($internship_fields as $field)
          <option value="{{$field->id}}" @if($experience->internship_field_id == $field->id) selected="selected" @endif >{{$field->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="" class="control-label">Company Name</label>
      <input type="text" class="form-control" name="experience[company_name]"
             value="{{$experience->company_name}}" placeholder="Company Name">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Work type</label>
      <div class="clearfix">
        <label for="" class="control-label"><input type="radio" name="experience[work_type]"
                                                   @if($experience->work_type==null) checked="checked" @endif
                                                   @if($experience->work_type=='any') checked="checked" @endif
                                                   value="any">&nbsp;Any&nbsp;</label>
        <label for="" class="control-label"><input type="radio" name="experience[work_type]"
                                                   @if($experience->work_type == 'full_time_office') checked="checked" @endif
                                                   value="full_time_office">&nbsp;Full Time (office)&nbsp;</label>
        <label for="" class="control-label"><input type="radio" name="experience[work_type]"
                                                   @if($experience->work_type == 'part_time_office') checked="checked" @endif
                                                   value="part_time_office">&nbsp;Part Time (office)&nbsp;</label>
        <label for="" class="control-label"><input type="radio" name="experience[work_type]"
                                                   @if($experience->work_type == 'full_time_home') checked="checked" @endif
                                                   value="full_time_home">&nbsp;Work from Home (Full time)&nbsp;</label>
        <label for="" class="control-label"><input type="radio" name="experience[work_type]"
                                                   @if($experience->work_type == 'part_time_office') checked="checked" @endif
                                                   value="part_time_office">&nbsp;Work from Home (Part time)&nbsp;</label>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Duration</label>

      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <input type="text" placeholder="Started at" class="form-control common-date-picker"
                   name="experience[work_from]" value="{{$experience->work_from}}"></div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <input type="text" placeholder="Finished at" class="form-control common-date-picker"
                   name="experience[work_to]" value="{{$experience->work_to}}"></div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="" class="control-label">
        Receive Payment&nbsp;
        <input type="checkbox" name="experience[stipend]" value="1" @if($experience->stipend) checked="checked" @endif>
      </label>

    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="form-group">
      <label for="" class="control-label">Description</label>
      <textarea name="experience[job_description]" id="" cols="30" rows="5"
                class="form-control" placeholder="Job description">{{$experience->job_description}}</textarea>
    </div>
  </div>
</div>
