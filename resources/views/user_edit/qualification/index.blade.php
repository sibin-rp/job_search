@extends('layouts.user')
@section('content')
  <div class="container ">
    <div class="row">
      @include('user_partial._sidebar')
      <div class="col-xs-12 col-sm-8">
        @if($qualifications->count() > 0)
          @foreach($qualifications->get() as $qualification)
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{$user->type}}" aria-expanded="true" aria-controls="collapseOne">
                      {{$qualification->type}}
                    </a>
                  </h4>
                </div>
                <div id="{{$qualification->type}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">

                  </div>
                </div>
              </div>
              </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@stop