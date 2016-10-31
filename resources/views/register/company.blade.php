@extends('layouts.home')
@section('content')
<div class="company-info-register register-wrapper">
  <div class="container">
    <div class="register">
      <div class="row">
        <div class="col-xs-12">
          <div class="">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Company Registration</h3>
              </div>
              <div class="panel-body">
                <form action="{{route('save_company_info')}}" method="POST">
                  {{csrf_field()}}
                  {{method_field('POST')}}
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">


                      <div class="form-group">
                        <label for="company-name" class="control-label">Your Name</label>
                        <input id="company-name" type="text" class="form-control" placeholder="Your name" name="user[name]">
                      </div>
                      <div class="form-group">
                        <label for="company-name" class="control-label">Your Role</label>
                        <select name="user[role]" id="company-role" class="form-control">
                          <option value="">Select</option>
                          <option value="ceo">CEO</option>
                          <option value="cto">CTO</option>
                          <option value="team_lead">Team Lead</option>
                          <option value="recruiter">Recruiter</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="company-linkedin" class="control-label">Linkedin</label>
                        <input id="company-linkedin" type="text" class="form-control" placeholder="Linkedin" name="company[linkedin_id]">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div id="company-logo" class="dropzone">

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="page-header">
                        <h5>
                          Company Details
                        </h5>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Company Name</label>
                        <input type="text" name="company[name]" class="form-control" placeholder="Company name">
                      </div>
                      <div class="form-group">
                        <label for="company-website" class="control-label">Website</label>
                        <input id="company-website" type="text" class="form-control" placeholder="Website" name="company[website]">
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">City</label>
                        <input type="text" class="form-control" placeholder="City" name="company[city]">
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">State</label>
                        <select name="company[state]" id="" class="form-control">
                          @foreach($states as $code => $state)
                            <option value="{{$code}}">{{$state}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="page-header">
                        <h5 class="invisible">
                          Company Details
                        </h5>
                      </div>
                      <div class="form-group">
                        <label for="">Type of Company</label>
                        <div class="clearfix">
                          <label for="">StartUp&nbsp; <input type="radio" value="start_up" name="company[organization_type]">&nbsp;</label>
                          <label for="">Non-Profit&nbsp; <input type="radio" value="non_profit" name="company[organization_type]">&nbsp;</label>
                          <label for="">MNC&nbsp; <input type="radio" value="mnc" name="company[organization_type]">&nbsp;</label>
                          <label for="">NGO&nbsp; <input type="radio" value="ngo" name="company[organization_type]">&nbsp;</label>
                          <label for="">Other&nbsp; <input type="radio" value="other" name="company[organization_type]">&nbsp;</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">About</label>
                        <textarea name="company[information]" id="" cols="30" rows="5" class="form-control" placeholder="Company information"></textarea>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="form-submit text-right">
                        <button type="submit" class="btn btn-lg">Continue</button>
                      </div>
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
</div>
@stop