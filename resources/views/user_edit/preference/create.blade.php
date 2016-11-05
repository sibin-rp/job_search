@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4>Add Internship Preference</h4>
    </div>
    <div class="form-section">
      <form action="{{route('preference.store',['user'=> $user])}}" method="post" data-parsley-validate="">
        {{csrf_field()}}
        {{method_field('POST')}}
        @include('user_edit.preference._partial_form')
        <!-- end available time -->
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="" class="control-label">
                Skills pertaining to the field of internship
                <small>(<i>Please select internship fields</i>)</small>
              </label>
              <div class="clearfix hidden" id="skill-box">
                <div class="">
                  <ul class="" id="skill-box-list"></ul>
                </div>
                <div class="well hidden">
                  <ul class="list-group" id="choose-skill-level">

                  </ul>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="text-right">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

@stop