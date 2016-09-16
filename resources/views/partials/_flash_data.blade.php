@if(session('message') && session('class'))
  <div class="main-fixed-alert">
    <div class="alert {{session('class')}} ">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Attention!</strong>
      {!! session('message') !!}
    </div>
  </div>
@endif