@extends('layouts.user')
@section('content')
  <div class="col-xs-12 col-sm-8">
    <div class="page-header">
      <h3>Company Information</h3>
    </div>
    <div class="company-info">
      <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate="">
        {{csrf_field()}}
        {{method_field('POST')}}
        @include('company.company._form')
      </form>
    </div>
  </div>
@stop