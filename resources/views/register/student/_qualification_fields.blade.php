<div role="tabpanel" class="tab-pane active" id="10_th">
  <div class="page-header">
    <h4>10<sup>th</sup> Standards</h4>
  </div>
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
  {{csrf_field()}}
  {{method_field('POST')}}
  @include('register.student.qual_partials._10_th')
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="12_th">
  <div class="page-header">
    <h4>
      12<sup>th</sup> Standard
    </h4>
  </div>
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
  {{csrf_field()}}
  {{method_field('POST')}}
  @include('register.student.qual_partials._12_th')
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="graduation">
  <div class="page-header">
    <h4>Graduation</h4>
  </div>
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
  {{csrf_field()}}
  {{method_field('POST')}}
  @include('register.student.qual_partials._graduation')

    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="post_graduation">
  <div class="page-header">
    <h4>Post Graduation</h4>
  </div>
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
  {{csrf_field()}}
  {{method_field('POST')}}
  @include('register.student.qual_partials._post_graduation')
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="diploma">
  <div class="page-header">
    <h4>Diploma</h4>
  </div>
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
  {{csrf_field()}}
  {{method_field('POST')}}
  @include('register.student.qual_partials._diploma')
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="phd">
  <div class="page-header">
    <h4>PhD</h4>
  </div>
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
  {{csrf_field()}}
  {{method_field('POST')}}
  @include('register.student.qual_partials._phd')
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="academic">
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
    {{csrf_field()}}
    {{method_field('POST')}}
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
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
    </form>
</div>
<div role="tabpanel" class="tab-pane" id="sports">
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
    {{csrf_field()}}
    {{method_field('POST')}}
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
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="arts">
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
    {{csrf_field()}}
    {{method_field('POST')}}
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
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div role="tabpanel" class="tab-pane" id="other">
  <form action="{{route('save_student_qualification')}}" method="post" id="internship-qualification-form">
    {{csrf_field()}}
    {{method_field('POST')}}
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
    <div class="row">
      <div class="col-xs-12">
        <div class="text-right">
          <button class="btn btn-primary">Continue</button>
        </div>
      </div>
    </div>
  </form>
</div>