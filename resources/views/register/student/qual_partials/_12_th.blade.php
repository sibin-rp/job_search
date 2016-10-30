<div class="row">
  <div class="col-xs-12 col-sm-6">
    <div class="form-group">
      <label for="" class="control-label">Year of Completion</label>
      <input type="text" class="form-control year-datepicker" placeholder="Year of completion"
             name="internship[qualification][12_th][completed]">
    </div>
    <div class="form-group">
      <label for="" class="control-label">Stream</label>
      <select name="internship[qualification][12_th][stream]" id="" class="form-control">
        <option value="">Select</option>
        @if(isset($qualifications['12_th']))
          @foreach($qualifications['12_th'] as $qualification)
            <option value="{{$qualification['id']}}">{{$qualification['name']}}</option>
          @endforeach
        @endif
      </select>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6">
    <div class="qualification-section">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <label for="" class="control-label">Percentage / CGPA</label>
        <select name="internship[qualification][12_th][mark_type]" id="" class="q-type form-control">
          <option value="cgpa_4" selected="selected">CGPA 4</option>
          <option value="cgpa_10">CGPA 10</option>
          <option value="percentage" >Percentage</option>
        </select>
      </div>
      <div class="col-xs-12 col-sm-6">
        <label for="" class="control-label">Performance</label>
        <input type="number" class="q-mark form-control" name="internship[qualification][12_th][mark]"
               placeholder="Performance"
               step="0.01"  min="0" max="4">
      </div>
    </div>
      </div>
  </div>
</div>