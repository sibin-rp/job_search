@extends('layouts.user')
@section('content')
  <div class="col-sm-8 col-md-8 col-lg-9">
    <form action="{{route('user.update',$user->id)}}" method="POST">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="user-first-name" class="control-label">First Name</label>
            <input type="text" name="user[first_name]" class="form-control" id="user-first-name"
                   value="{{$user->first_name}}" placeholder="First name">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="user-last-name" class="control-label">Last Name</label>
            <input type="text" id="user-last-name" class="form-control" name="user[last_name]"
                   value="{{$user->last_name}}" placeholder="Last name">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="user-dob" class="control-label">Dob</label>
            <input type="text" name="user[dob]" class="form-control" id="user-dob"
                   value="{{$user->dob}}" placeholder="Date of Birth">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="user-phone" class="control-label">Phone</label>
            <input type="text" id="user-phone" class="form-control" name="user[phone_no]"
                   value="{{$user->phone_no}}" placeholder="Phone number">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="" class="control-label">Describe</label>
            <input type="text" class="form-control" name="user[describe]"
                   value="{{$user->describe}}" placeholder="Describe">
          </div>
          <div class="form-group"><label for="s" class="control-label">Bio</label>
            <textarea class="form-control" name="user[bio]" placeholder="Bio">{{$user->bio}}</textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <label for=""><input type="radio" name="user[sex]" value="1">&nbsp;Male</label>
          <label for=""><input type="radio" name="user[sex]" value="2">&nbsp;Female</label>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Alternate Contract</label>
            <input type="text" name="user[alternate_contact]"
                   class="form-control" placeholder="Alternate Contract" value="{{$user->alternate_contact}}"></div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Alternate Email</label>
            <input type="text" name="user[alternate_email]" class="form-control"
                   placeholder="Alternate Email" value="{{$user->alternate_email}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <textarea name="user[home_address]" id="" cols="30" rows="4"
                          class="form-control" placeholder="Address">{{$user->home_address}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="" class="control-label">State</label>
                <select name="user[home_state]" id="" class="form-control">
                  @foreach($states as $code => $value)
                    <option value="{{$code}}" @if($code==$user->home_state) selected="" @endif>{{$value}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="" class="control-label">Current Address</label>
                <textarea name="user[live_address]" id="" cols="30" rows="4"
                          class="form-control" placeholder="Address">{{$user->live_address}}</textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="" class="control-label">Current State </label>
                <select name="user[live_state]" id="" class="form-control">
                  @foreach($states as $code => $value)
                    <option value="{{$code}}" @if($code==$user->live_state) selected="" @endif>{{$value}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="form-group">
            <button class="btn btn-md btn-success" type="submit">Update User</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@stop