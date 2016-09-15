<div class="vertical-search-form">
  <form action="" method="GET">
    <div class="row">
      <h3>Internship field</h3>
      <select  class="form-control select-2-select" name="internship_field_id">
        <option value="">Select</option>
        @foreach($internship_fields as $key => $field)
          <option value="{{$field['id']}}">{{$field['name']}}</option>
        @endforeach
      </select>
    </div>

    <div class="row">

      <h3>Internship type</h3>
      <p><input type="checkbox" name="type" value="any" checked>&nbsp;Any</p>
      <p><input type="checkbox" name="type" value="full_time_office">&nbsp;Full time office</p>
      <p><input type="checkbox" name="type" value="part_time_office">&nbsp;Part time office</p>
      <p><input type="checkbox" name="type" value="full_time_home">&nbsp;Full time home</p>
      <p><input type="checkbox" name="type" value="part_time_home">&nbsp;Part time home</p>


    </div>
    <div class="row">
      <h3>Internship Duration</h3>
      <p><input type="radio" name="duration" value="any">Any</p>
      <p><input type="radio" name="duration" value="0-3">0-3 Month</p>
      <p><input type="radio" name="duration" value="6-9">6-9  Month</p>
      <p><input type="radio" name="duration" value="0-12">9-12 Month</p>
      <p><input type="radio" name="duration" value="1+">1+ Year</p>
    </div>
    <div class="row">

      <h3>Internship Salary <small>in Rupee</small></h3>
      <p>
        @php
          $stipend = explode(",", app('request')->input('stipend'))
        @endphp

        <input id="ex1" data-slider-id='ex1Slider' type="text" name="stipend"
               data-slider-min="0" data-slider-max="{{ $min_and_max_stipend->max_s}}"
               data-slider-step="5" data-slider-value="[{{$stipend[0] or $min_and_max_stipend->min_s}},{{$stipend[1] or $min_and_max_stipend->max_s}}]"/>
      </p>
      <p class="clearfix">
        <span class="pull-left">0</span>
        <span class="pull-right">{{$min_and_max_stipend->max_s}}</span>
      </p>


    </div>
    <div class="row">

      <h3>State</h3>
      <div class="form-group">
        <select class="select-2-select form-control" name="state">
          <option value="">Select</option>
          @foreach($states as $key => $state)
            <option value="{{$key}}">{{$state}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row">
      <button class="btn btn-success btn-block ">
        <span class="glyphicon glyphicon-search"></span>
        Search
      </button>
    </div>
  </form>
</div>