@php
  $default_experience = [
    'experience_type'     => null,
    'company_name'        => null,
    'internship_field_id' => null,
    'work_type'           => null,
    'work_from'           => null,
    'work_to'             => null,
    'stipend'             => null,
    'salary'              => null,
    'title'               => null,
    'job_description'     => null,
    'location'            => null,
    'organization'        => null,
    'link'                => null,
    'certificate'         => null,
    'mark'                => null
  ];
  $actaul_experience     = [];
  if(isset($experience)){
    $actaual_experience   = $experience->toArray();
  }
  $experience = array_merge($default_experience, $actaual_experience);
  $experience = (object) $experience;
@endphp


<!-- TAB NAVIGATION -->
@if($experience->experience_type == null)
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Internship</a></li>
    <li><a href="#tab2" role="tab" data-toggle="tab">Job</a></li>
    <li><a href="#tab3" role="tab" data-toggle="tab">Project/Freelance/Training/Other</a></li>
</ul>
@endif

  {{$experience->experience_type}}
  {{$experience->experience_type == null || $experience->experience_type == 'job'}}
<!-- TAB CONTENT -->
<div class="tab-content">
  <!-- INTERNSHIP TAB -->
  @if($experience->experience_type == null || $experience->experience_type == 'internship')
  <div class="tab-pane active fade in" id="tab1">
    <h2>Internship</h2>
    <!-- INTERNSHIP FORM -->
    <form action="{{$_route_url}}" method="post">
      @if($_method=="PUT")
        {{method_field('PUT')}}
      @else
        {{method_field('POST')}}
      @endif
      {{csrf_field()}}
        <input type="hidden" name="experience[experience_type]" value="internship">
      <!-- actual form -->
      @include('user_edit.experience._partials._job_form')
      <!-- end actual form -->
      <div class="row">
        <div class="col-xs-12 text-right">
         <div class="form-group">
           <button class="btn btn-primary btn-md" type="submit">
             @if($_method=="PUT")
               Save
             @else
               Create
             @endif
           </button>
         </div>
        </div>
      </div>
    </form>
    <!-- END INTERNSHIP FORM -->
  </div>
  @endif
  <!-- END INTERNSHIP TAB -->
  <!-- JOB TAB -->
  @if($experience->experience_type == null || $experience->experience_type == 'job')
  <div class="tab-pane fade in @if($experience->experience_type == 'job') active @endif " id="tab2">
    <h2>Job</h2>
    <!-- JOB FORM -->
    <form action="{{$_route_url}}" method="post">
      @if($_method=="PUT")
        {{method_field('PUT')}}
      @else
        {{method_field('POST')}}
      @endif
      {{csrf_field()}}
        <input type="hidden" name="experience[experience_type]" value="job">
        @include('user_edit.experience._partials._job_form')

        <div class="row">
          <div class="col-xs-12 text-right">
            <div class="form-group">
              <button class="btn btn-primary btn-md" type="submit">
                @if($_method=="PUT")
                  Save
                @else
                  Create
                @endif
              </button>
            </div>
          </div>
        </div>
    </form>
    <!-- END JOB FORM -->
  </div>
  @endif
  <!-- END JOB TAB -->
  <!-- PROJECT/FREELANCE TAB -->
  @if($experience->experience_type == null || in_array($experience->experience_type,
  ['project','freelance','training','other']))
  <div class="tab-pane fade in @if(in_array($experience->experience_type,
  ['project','freelance','training','other'])) active @endif" id="tab3">
    <h2>Project/Freelance/Training/Other</h2>
    <!-- PROJECT/FREELANCE FORM -->
    <form action="{{$_route_url}}" method="post">
      @if($_method=="PUT")
        {{method_field('PUT')}}
      @else
        {{method_field('POST')}}
      @endif
      {{csrf_field()}}
      @include('user_edit.experience._partials._other_form')
        <div class="row">
          <div class="col-xs-12 text-right">
            <div class="form-group">
              <button class="btn btn-primary btn-md" type="submit">
                @if($_method=="PUT")
                  Save
                @else
                  Create
                @endif
              </button>
            </div>
          </div>
        </div>
    </form>
    <!-- END PROJECT/FREELANCE FORM -->
    @endif
  </div>
  <!-- END PROJECT/FREELANCE TAB -->
</div>
