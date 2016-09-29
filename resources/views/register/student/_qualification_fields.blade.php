<div role="tabpanel" class="tab-pane active" id="10_th">
  <div class="page-header">
    <h4>10<sup>th</sup> Standards</h4>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">Year of Completion</label>
        <input type="text" class="form-control year-datepicker" placeholder="Year of completion"
               name="internship[qualification][10_th][completed]">
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <label for="" class="control-label">Percentage / CGPA</label>
          <select name="internship[qualification][10_th][mark_type]" id="" class="form-control">
            <option value="">Select</option>
            <option value="cgpa_4">CGPA 4</option>
            <option value="cgpa_10">CGPA 10</option>
            <option value="percentage">Percentage</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-6">
          <label for="" class="control-label">Performance</label>
          <input type="text" class="form-control" name="internship[qualification][10_th][mark]" placeholder="Performance">
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="12_th">
  <div class="page-header">
    <h4>
      12<sup>th</sup> Standard
    </h4>
  </div>
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
          <option value="biology">Biology</option>
          <option value="computer">Computer</option>
          <option value="commerce">Commerce</option>

        </select>
      </div>
    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <label for="" class="control-label">Percentage / CGPA</label>
          <select name="internship[qualification][12_th][mark_type]" id="" class="form-control">
            <option value="">Select</option>
            <option value="cgpa_4">CGPA 4</option>
            <option value="cgpa_10">CGPA 10</option>
            <option value="percentage">Percentage</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-6">
          <label for="" class="control-label">Performance</label>
          <input type="text" class="form-control" name="internship[qualification][12_th][mark]" placeholder="Performance">
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="graduation">
  <div class="page-header">
    <h4>Graduation</h4>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">College Name</label>
        <input type="text" placeholder="College name" name="internship[qualification][graduation][college_name]"
               class="form-control">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Start Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][graduation][started_at]"
                   placeholder="Started at">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">End Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][graduation][completed_at]"
                   placeholder="Completed at">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label">Degree</label>
        <select name="internship[qualification][graduation][degree]" id="" class="form-control">
          <option value="">Select</option>
          <option value="b_tech">B-Tech</option>
          <option value="bse_physics">BSE - Physics</option>
          <option value="bse_maths">BSE - Maths</option>
        </select>
      </div>

    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">Stream</label>
        <select name="internship[qualification][graduation][stream]" id="" class="form-control">
          <option value="">Select</option>
          <option value="b_tech">B-Tech</option>
          <option value="bse_physics">BSE - Physics</option>
          <option value="bse_maths">BSE - Maths</option>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
          <select name="internship[qualification][graduation][mark_type]" id="" class="form-control">
            <option value="">Select</option>
            <option value="percentage">Percentage</option>
            <option value="cgpa_4">CGPA 4</option>
            <option value="cgpa_10">CGPA 10</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
          <input type="text" class="form-control" name="internship[qualification][graduation][mark]" placeholder="Performance">
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="post_graduation">
  <div class="page-header">
    <h4>Post Graduation</h4>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">College Name</label>
        <input type="text" placeholder="College name" name="internship[qualification][post_graduation][college_name]"
               class="form-control">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Start Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][post_graduation][started_at]"
                   placeholder="Started at">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">End Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][post_graduation][completed_at]"
                   placeholder="Completed at">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="" class="control-label">Degree</label>
        <select name="internship[qualification][post_graduation][degree]" id="" class="form-control">
          <option value="">Select</option>
          <option value="b_tech">B-Tech</option>
          <option value="bse_physics">BSE - Physics</option>
          <option value="bse_maths">BSE - Maths</option>
        </select>
      </div>

    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="row">
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
          <select name="internship[qualification][post_graduation][mark_type]" id="" class="form-control">
            <option value="">Select</option>
            <option value="percentage">Percentage</option>
            <option value="cgpa_4">CGPA 4</option>
            <option value="cgpa_10">CGPA 10</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
          <input type="text" class="form-control" name="internship[qualification][post_graduation][mark]" placeholder="Performance">
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="diploma">
  <div class="page-header">
    <h4>Diploma</h4>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">College Name</label>
        <input type="text" placeholder="College name" name="internship[qualification][diploma][college_name]"
               class="form-control">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Start Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][diploma][started_at]"
                   placeholder="Started at">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">End Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][diploma][completed_at]"
                   placeholder="Completed at">
          </div>
        </div>
      </div>

    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">Stream</label>
        <select name="internship[qualification][diploma][stream]" id="" class="form-control">
          <option value="">Select</option>
          <option value="b_tech">B-Tech</option>
          <option value="bse_physics">BSE - Physics</option>
          <option value="bse_maths">BSE - Maths</option>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
          <select name="internship[qualification][diploma][mark_type]" id="" class="form-control">
            <option value="">Select</option>
            <option value="percentage">Percentage</option>
            <option value="cgpa_4">CGPA 4</option>
            <option value="cgpa_10">CGPA 10</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
          <input type="text" class="form-control" name="internship[qualification][graduation][mark]" placeholder="Performance">
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="phd">
  <div class="page-header">
    <h4>PhD</h4>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">College Name</label>
        <input type="text" placeholder="College name" name="internship[qualification][phd][college_name]"
               class="form-control">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">Start Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][phd][started_at]"
                   placeholder="Started at">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="form-group">
            <label for="" class="control-label">End Year</label>
            <input type="text" class="form-control year-datepicker" name="internship[qualification][phd][completed_at]"
                   placeholder="Completed at">
          </div>
        </div>
      </div>

    </div>
    <div class="col-xs-12 col-sm-6">
      <div class="form-group">
        <label for="" class="control-label">Stream</label>
        <select name="internship[qualification][phd][stream]" id="" class="form-control">
          <option value="">Select</option>
          <option value="b_tech">B-Tech</option>
          <option value="bse_physics">BSE - Physics</option>
          <option value="bse_maths">BSE - Maths</option>
        </select>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Type</label>
          <select name="internship[qualification][phd][mark_type]" id="" class="form-control">
            <option value="">Select</option>
            <option value="percentage">Percentage</option>
            <option value="cgpa_4">CGPA 4</option>
            <option value="cgpa_10">CGPA 10</option>
          </select>
        </div>
        <div class="col-xs-12 col-sm-6"><label for="" class="control-label">Mark</label>
          <input type="text" class="form-control" name="internship[qualification][phd][mark]" placeholder="Performance">
        </div>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="academic">
  <div id="vue-academic-section">
    <div class="page-header">
      <h4 class="clearfix">
        Academic
        <a href="" v-on:click="addMore($event,academics )" class="pull-right">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
      </h4>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <fieldset v-for="aca in academics">
          <legend class="clearfix"> Academic @{{ $index + 1 }}
          <span class="glyphicon glyphicon-trash pull-right" v-on:click="remove(aca)"></span>
          </legend>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Tile</label>
                <input type="text" class="form-control"
                       name="internship[qualification][others][academic][@{{ $index }}][title]" placeholder="Title">
              </div>
              <div class="form-group"><label for="" class="control-label">Link</label>
                <input type="text" name="internship[qualification][others][academic][@{{ $index }}][link]" class="form-control" placeholder="Academic link">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Description</label>
                <textarea name="internship[qualification][others][academic][@{{ $index }}][description]" id="" cols="30"
                          rows="4" class="form-control" placeholder="Description"></textarea>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="sports">
  <div id="vue-sports-section">
    <div class="page-header">
      <h4 class="clearfix">
        Sports
        <a href="" v-on:click="addMore($event,sports )" class="pull-right">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
      </h4>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <fieldset v-for="sport in sports">
          <legend class="clearfix"> Sports @{{ $index + 1 }}
            <span class="glyphicon glyphicon-trash pull-right" v-on:click="remove(sport)"></span>
          </legend>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Tile</label>
                <input type="text" class="form-control"
                       name="internship[qualification][others][sports][@{{ $index }}][title]" placeholder="Title">
              </div>
              <div class="form-group"><label for="" class="control-label">Link</label>
                <input type="text" name="internship[qualification][others][sports][@{{ $index }}][link]" class="form-control" placeholder="Academic link">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Description</label>
                <textarea name="internship[qualification][others][sports][@{{ $index }}][description]" id="" cols="30"
                          rows="4" class="form-control" placeholder="Description"></textarea>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="arts">
  <div id="vue-arts-section">
    <div class="page-header">
      <h4 class="clearfix">
        Arts
        <a href="" v-on:click="addMore($event,arts )" class="pull-right">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
      </h4>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <fieldset v-for="sport in arts">
          <legend class="clearfix"> Arts @{{ $index + 1 }}
            <span class="glyphicon glyphicon-trash pull-right" v-on:click="remove(sport)"></span>
          </legend>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Tile</label>
                <input type="text" class="form-control"
                       name="internship[qualification][others][arts][@{{ $index }}][title]" placeholder="Title">
              </div>
              <div class="form-group"><label for="" class="control-label">Link</label>
                <input type="text" name="internship[qualification][others][arts][@{{ $index }}][link]" class="form-control" placeholder="Academic link">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Description</label>
                <textarea name="internship[qualification][others][arts][@{{ $index }}][description]" id="" cols="30"
                          rows="4" class="form-control" placeholder="Description"></textarea>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<div role="tabpanel" class="tab-pane" id="other">
  <div id="vue-others-section">
    <div class="page-header">
      <h4 class="clearfix">
        Others
        <a href="" v-on:click="addMore($event,others )" class="pull-right">
          <span class="glyphicon glyphicon-plus"></span>
        </a>
      </h4>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <fieldset v-for="sport in others">
          <legend class="clearfix"> Others @{{ $index + 1 }}
            <span class="glyphicon glyphicon-trash pull-right" v-on:click="remove(sport)"></span>
          </legend>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Tile</label>
                <input type="text" class="form-control"
                       name="internship[qualification][others][other][@{{ $index }}][title]" placeholder="Title">
              </div>
              <div class="form-group"><label for="" class="control-label">Link</label>
                <input type="text" name="internship[qualification][others][other][@{{ $index }}][link]" class="form-control" placeholder="Academic link">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group"><label for="" class="control-label">Description</label>
                <textarea name="internship[qualification][others][other][@{{ $index }}][description]" id="" cols="30"
                          rows="4" class="form-control" placeholder="Description"></textarea>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>