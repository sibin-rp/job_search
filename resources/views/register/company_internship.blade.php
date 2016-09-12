@extends('layouts.home')
@section('content')
  <div class="company-info-register">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="">Add Internship</h3>
              </div>
              <div class="panel-body">
                <form action="" method="post">
                  {{csrf_field()}}
                  {{method_field('POST')}}
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label for="" class="control-label">Field of Internship</label>
                        <select name="internship[field]" id="" class="form-control select-2-select">
                          @foreach($internship_fields as $field)
                            <option value="{{$field['id']}}">{{$field['name']}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="" class="control-label">Job Title</label>
                        <input type="text" name="internship[]" class="form-control" placeholder="Job Title">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6"></div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop