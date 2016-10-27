@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4>Add Experience</h4>
    </div>
    <div class="form-section">
      @include('user_edit.experience._form',
        ['_method'=>"POST", '_route_url'=> route('experience.store',['user'=> $user])]
      )
    </div>
  </div>

@stop