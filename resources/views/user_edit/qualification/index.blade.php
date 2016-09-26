@extends('layouts.user')
@section('content')
  <div class="container ">
    <div class="row">
      @include('user_partial._sidebar')
      <div class="col-xs-12 col-sm-8">
        @foreach($qualifications->get() as $qualification)
          
        @endforeach
      </div>
    </div>
  </div>
@stop