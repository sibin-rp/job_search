@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4>Add Internship Preference</h4>
    </div>
    <div class="form-section">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Internship Field</label>
            <select name="preference[internship_field_id]" id="" class="form-control">
              @foreach($internship_fields as $field)
              <option value="{{$field->id}}">{{$field->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">City of internship</label>
            <select name="" id="" class="form-control">
              <option value="">Kochi</option>
              <option value="">TVM</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Type of company</label>

            <div class="clearfix">
              <label><input type="radio" name="preference[duration]" value="">Any</label>
              <label><input type="radio" name="preference[duration]" value="">Startup</label>
              <label> <input type="radio" name="preference[duration]" value="">MNC</label>
              <label> <input type="radio" name="preference[duration]" value="">NGO</label>
              <label> <input type="radio" name="preference[duration]" value="">Other</label>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Duration of internship</label>

            <div class="clearfix">
              <label><input type="radio" name="preference[duration]" value="">Any</label>
              <label><input type="radio" name="preference[duration]" value="">0 to 3 months</label>
              <label><input type="radio" name="preference[duration]" value="">3 to 6 months</label>
              <label><input type="radio" name="preference[duration]" value="">6 to 9 months</label>
              <label><input type="radio" name="preference[duration]" value="">9 to 12 months</label>
            </div>


          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Type of internship</label>

            <div class="clearfix">
              <label><input type="radio" name="preference[duration]" value="">Any</label>
              <label><input type="radio" name="preference[duration]" value="">0 to 3 months</label>
              <label><input type="radio" name="preference[duration]" value="">3 to 6 months</label>
              <label><input type="radio" name="preference[duration]" value="">6 to 9 months</label>
              <label><input type="radio" name="preference[duration]" value="">9 to 12 months</label>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Expected stipend</label>

            <div class="clearfix">
              <div class="row">
                <div class="col-md-6">
                  <label> From:<input type="text" class="form-control" id=""></label>
                </div>
                <div class="col-md-6">
                  <label> To:<input type="text" class="form-control" id=""></label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Skills pertaining to the field of internship</label>

            <div class="clearfix">
              <label>Java</label>
              <label><input type="radio" name="preference[duration]" value="">Beginner</label>
              <label><input type="radio" name="preference[duration]" value="">Intermediate</label>
              <label><input type="radio" name="preference[duration]" value="">Expert</label>
              <label>Ruby on Rails</label>
              <label><input type="radio" name="preference[duration]" value="">Beginner</label>
              <label><input type="radio" name="preference[duration]" value="">Intermediate</label>
              <label><input type="radio" name="preference[duration]" value="">Expert</label>
              <label>Php</label>
              <label><input type="radio" name="preference[duration]" value="">Beginner</label>
              <label><input type="radio" name="preference[duration]" value="">Intermediate</label>
              <label><input type="radio" name="preference[duration]" value="">Expert</label>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@stop