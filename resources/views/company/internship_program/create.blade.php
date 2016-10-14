@extends('layouts.user')
@section('content')
    <div class="col-xs-12 col-sm-8">
        <div class="page-header">
            <h3>Add new Internship Preference</h3>
        </div>
        <div class="internship-p-form">
            @include('company.internship_program._form')
        </div>
    </div>
@stop