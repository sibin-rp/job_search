@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      {{$internship->title}}
    </div>
    <div class="internship-edit-form">
      <form action="{{route('internships_program.update',['company_user'=> $user,
      'internships_program' => $internship])}}" method="post" novalidate=""
        class="main-forms">
        {{method_field('PUT')}}
        @include('company.internship_program._form')
      </form>
    </div>
  </div>

@stop