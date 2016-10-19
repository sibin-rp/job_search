@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3>{{$user->name}}</h3>
    </div>
    <div class="user-edit-form common-form-wrapper">
      <form action="{{route('company_user.update',['user'=>$user])}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="" class="control-label">First Name</label>
              <input type="text" class="form-control" name="company[user]" value="{{$user->first_name}}"
                     placeholder="First Name"/>
            </div>
            <div class="form-group">
              <label for="" class="control-label">Last Name</label>
              <input type="text" class="form-control" placeholder="Last Name" name="company[last_name]"
                     value="{{$user->last_name}}"/>
            </div>
            <div class="form-group">
              <label for="" class="control-label">Phone</label>
              <input type="text" placeholder="Phone number" value="{{$user->phone_no}}" class="form-control" name="company[phone_no]">
            </div>
            <div class="form-group">
              <label for="" class="control-label">Date Of Birth</label>
              <input type="text" placeholder="Date of Birth" value="{{$user->dob}}" class="form-control common-date-picker" name="company[dob]">
            </div>
            <div class="form-group">
              <label for="" class="control-label">Gender</label>
              <div class="clearfix">
                <label for=""><input type="radio" @if($user->sex==1) checked="checked" @endif name="company[sex]" value="1">&nbsp;Male</label>
                <label for=""><input type="radio" @if($user->sex==2) checked="checked" @endif name="company[sex]" value="2">&nbsp;Female</label>
                <label for=""><input type="radio" @if($user->sex==3) checked="checked" @endif name="company[sex]" value="3">&nbsp;Other</label>
              </div>
            </div>
            <div class="form-group">
              <label for="home-city" class="control-label">Home City</label>
              <input type="text" class="form-control" id="home-city" name="company[home_city]"
                     placeholder="Home City" value="{{$user->home_city}}">
            </div>

            <div class="form-group">
              <label for="company-home_address" class="control-label">Home Address</label>
              <textarea style="height: 108px" class="form-control" id="company-home_address" name="company[home_address]"
                placeholder="Home Address" rows="4">{{$user->home_address}}</textarea>
            </div>
            <div class="form-group">
              <label for="home-city" class="control-label">Home State</label>
              <select name="company[home_state]" id="" class="form-control">
                @foreach($states as $code => $state)
                  <option value="{{$code}}" @if($user->home_state == $code) @endif >{{$state}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="company-company" class="control-label">Company</label>
              <input type="text" class="form-control" value="{{$user->company->name}}" placeholder="Company" name="company[company]">
            </div>
            <div class="form-group">
              <label for="" class="control-label">Role</label>
              <select name="company[role]" id="" class="form-control">
                <option value="">Select</option>
                <option value="ceo" @if($user->role == 'ceo') selected="selected" @endif >CEO</option>
              </select>
            </div>
            <div class="form-group">
              <label for="" class="control-label">Current City</label>
              <input type="text" placeholder="Current City" value="{{$user->live_city}}" class="form-control" name="company[live_city]">
            </div>
            <div class="form-group">
              <label for="" class="control-label">Current Address</label>
              <textarea style="height: 108px" name="company[live_address]" id="" cols="30" rows="4"
                        class="form-control" placeholder="Current Address">{{$user->live_address}}</textarea>
            </div>
            <div class="form-group">
              <label for="" class="control-label">Current State</label>
              <select name="company[live_state]" id="" class="form-control">
                @foreach($states as $code => $state)
                  <option value="{{$code}}" @if($user->live_state == $code) @endif >{{$state}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="" class="control-label">Alternate Email</label>
              <input type="email" class="form-control" placeholder="Alternate Email" name="company[alternate_email]"
                     value="{{$user->alternate_email}}">
            </div>
            <div class="form-group">
              <label for="" class="control-label">Alternate Contacts</label>
              <input type="text" class="form-control" placeholder="Alternate Contact"
                    name="company[alternate_contact]" value="{{$user->alternate_phone}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="" class="control-label">Describe</label>
              <textarea name="company[describe]" id="" cols="30" rows="5" class="form-control" placeholder="Describe yourself">{{$user->describe}}</textarea>
            </div>
            <div class="clearfix text-right">
              <button type="submit" class="btn btn-success">
                <span class="fa fa-floppy"></span>
                Update
              </button>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
@stop