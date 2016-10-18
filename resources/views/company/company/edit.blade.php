@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3>Company Information</h3>
    </div>
    <div class="company-info">
      <form action="{{route('company.update',['company'=> $company])}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        @include('company.company._form')
      </form>
    </div>
  </div>

@stop