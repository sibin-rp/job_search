<!-- Set a default variable, and remove repetition -->
@php
$default_array = [
  'internship_field_id'  => null,
  'city'              => null,
  'company_type'      => null,
  'duration'          => null,
  'internship_type'   => null,
  'stipend_from'      => null,
  'stipend_to'        => null,
  'from_date'         => null,
  'to_date'           => null
];
$current_array = [];
if(isset($preference)){
  $current_array = $preference->toArray();
}
$current_array = array_merge($default_array, $current_array);
$preference_object = (object) $current_array;

@endphp
<div class="row">
  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Internship Field</label>
      <select name="preference[internship_field_id]" id="internship_field_select"
              required="required"
              class="form-control"  @if($preference_object->internship_field_id) disabled="disabled" @endif>
        <option value="">Select</option>
        @foreach($internship_fields as $field)
          <option value="{{$field->id}}" @if($preference_object->internship_field_id == $field->id) selected="selected" @endif>{{$field->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">City of internship</label>
      <input type="text" name="preference[city]" placeholder="Preferred City"
             required="required"
             class="form-control" value="@if($preference_object->city){{$preference_object->city}} @endif">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Type of company</label>

      <div class="clearfix">
        <label><input type="radio"  @if($preference_object->company_type=="any") checked="checked" @endif name="preference[company_type]" value="any">Any</label>
        <label><input type="radio"  @if($preference_object->company_type=="startup") checked="checked" @endif name="preference[company_type]" value="startup">Startup</label>
        <label> <input type="radio" @if($preference_object->company_type=="mnc") checked="checked" @endif name="preference[company_type]" value="mnc">MNC</label>
        <label> <input type="radio" @if($preference_object->company_type=="ngo") checked="checked" @endif name="preference[company_type]" value="ngo">NGO</label>
        <label> <input type="radio" @if($preference_object->company_type=="other") checked="checked" @endif name="preference[company_type]" value="other">Other</label>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Duration of internship</label>

      <div class="clearfix">
        <label><input type="radio" @if($preference_object->duration =="any") checked="checked" @endif name="preference[duration]" value="any">Any</label>
        <label><input type="radio" @if($preference_object->duration =="0_3") checked="checked" @endif name="preference[duration]" value="0_3">0 to 3 months</label>
        <label><input type="radio" @if($preference_object->duration =="3_6") checked="checked" @endif name="preference[duration]" value="3_6">3 to 6 months</label>
        <label><input type="radio" @if($preference_object->duration =="6_9") checked="checked" @endif name="preference[duration]" value="6_9">6 to 9 months</label>
        <label><input type="radio" @if($preference_object->duration =="9_12") checked="checked" @endif name="preference[duration]" value="9_12">9 to 12 months</label>
        <label><input type="radio" @if($preference_object->duration =="1_year_plus") checked="checked" @endif name="preference[duration]" value="1_year_plus">1 Year +</label>
      </div>


    </div>
  </div>
</div>

<div class="row">
  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Type of internship</label>

      <div class="clearfix">
        <label><input type="radio" @if($preference_object->internship_type =="any") checked="checked" @endif name="preference[internship_type]" value="any">Any</label>
        <label><input type="radio" @if($preference_object->internship_type =="full_time_office") checked="checked" @endif name="preference[internship_type]" value="full_time_office">Full Time (In Office)</label>
        <label><input type="radio" @if($preference_object->internship_type =="part_time_office") checked="checked" @endif name="preference[internship_type]" value="part_time_office">Part Time (In Office)</label>
        <label><input type="radio" @if($preference_object->internship_type =="full_time_home") checked="checked" @endif name="preference[internship_type]" value="full_time_home">Work from Home (Full time)</label>
        <label><input type="radio" @if($preference_object->internship_type =="part_time_home") checked="checked" @endif name="preference[internship_type]" value="part_time_home">Work from Home (Part time)</label>
      </div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Expected stipend</label>

      <div class="clearfix">
        <div class="row">
          <div class="col-md-6">
            <label class="control-label"> From:</label>
            <select name="preference[stipend_from]" id="" class="form-control" required="required">
              @for($i=1;$i<=50;$i++)
                <option value="{{$i*500}}" @if($preference_object->stipend_from == ($i*500) || $i==2) selected="selected" @endif>{{$i*500}}</option>
              @endfor
            </select>
          </div>
          <div class="col-md-6">
            <label class="control-label"> To:</label>
            <select name="preference[stipend_to]" id="" class="form-control" required="required">
              @for($i=1;$i<=50;$i++)
                <option value="{{$i*500}}" @if($preference_object->stipend_to == ($i*500) || $i==10) selected="selected" @endif>{{$i*500}}</option>
              @endfor
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Available time -->
<div class="row">
  <div class="col-xs-12 col-sm-6">
    <label for="">Availability</label>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="form-group"><label for="" class="control-label">From</label>
        <input name="preference[from_date]" value="@if($preference_object->from_date) {{$preference_object->from_date}} @endif"
               type="text" class="form-control common-date-picker" placeholder="Available from" required="required">
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="form-group"><label for="" class="control-label">To</label>
        <input name="preference[to_date]" value="@if($preference_object->to_date){{$preference_object->to_date}} @endif"
               type="text" class="form-control common-date-picker" placeholder="Available to" required="required">
        </div>
      </div>
    </div>
  </div>
</div>