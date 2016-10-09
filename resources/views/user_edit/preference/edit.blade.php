@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4>Edit Internship Preference</h4>
    </div>
    <div class="form-section">
      <form action="{{route('preference.update',['user'=> $user,'preference'=>$preference])}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        @include('user_edit.preference._partial_form')
          <!-- end available time -->
        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="" class="control-label">
                Skills pertaining to the field of internship
                <small>(<i>Please select internship fields</i>)</small>
              </label>
              <div class="clearfix " id="skill-box">
                <div class="">
                  <ul class="" id="skill-box-list">
                    @php
                      $get_my_skill_array = $preference->skills()->get()->toArray();
                      if(sizeof($get_my_skill_array) > 0)
                      $get_my_skill_array = array_pluck($get_my_skill_array,'id');
                    @endphp
                    @foreach($available_skills as $a_skill)
                      <li>
                        <input type="checkbox" value="{{$a_skill}}" @if(in_array($a_skill->id, $get_my_skill_array)) checked="checked" @endif>
                        {{$a_skill->name}}
                      </li>
                    @endforeach
                  </ul>
                </div>
                <div class="well ">
                  <ul class="list-group" id="choose-skill-level">
                    @foreach($preference->skills()->get() as $skill)
                      <li class="list-group-item skill-list-item-{{$skill->id}}">
                        {{$skill->name}}
                        <div class="pull-right">
                          <input type="radio" @if($skill->pivot->expertise =="beginner") checked="checked" @endif value="beginner" name="preference[skill][{{$skill->id}}]">&nbsp;Beginner&nbsp;
                          <input type="radio" @if($skill->pivot->expertise =="intermediate") checked="checked" @endif value="intermediate" name="preference[skill][{{$skill->id}}]">&nbsp;Intermediate&nbsp;
                          <input type="radio" @if($skill->pivot->expertise =="expert") checked="checked" @endif value="expert" name="preference[skill][{{$skill->id}}]">&nbsp;Expert&nbsp;
                        </div>
                      </li>
                    @endforeach
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