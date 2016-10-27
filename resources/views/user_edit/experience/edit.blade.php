@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h4>Edit Experience</h4>
    </div>
    <div class="form-section">
      @include('user_edit.experience._form',
        ['_method'=>"PUT", '_route_url'=> route('experience.update',
        ['user'=> $user , 'experience' => $experience])]
      )
    </div>
  </div>
@stop