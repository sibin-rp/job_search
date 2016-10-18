<div class="col-sm-4 col-md-4 col-lg-3">
  <div class="image-wrapper">
    @if($user->profile_path)
      <img class="img-responsive im" src="images/im.jpg">
    @else
      <img id="image" src="http://placehold.it/320" alt="" class="img-responsive img-round">
    @endif

    <div class="rp-glyp" id="rp-image-button">
      <div class="glyphicon-ring"><i class=" glyphicon glyphicon-folder-open"></i></div>
    </div>
  </div>
  <form method="post" action="{{route('company.logo.upload',['user'=> $user])}}" enctype="multipart/form-data"
        id="profile-image-upload">
    {{csrf_field()}}
    {{method_field('POST')}}
    <label for="upload">
      <input type="file" id="user-file-upload" style="display: none" name="file">
    </label>

  </form>
</div>






@section('extra_js')
  <script type="text/javascript">

    $(document).ready(function() {
      $("#rp-image-button").click(function () {
        $("#user-file-upload").click();
      });
      $('#user-file-upload').on('change', function(e){
        var fileReader = new FileReader();
        fileReader.onloadend = function(ev){
          $('.image-wrapper').find('img').attr('src', ev.target.result);

          //call ajax
          var url = $('#profile-image-upload').attr('action');
          var formData = new FormData();
          formData.append('logo', e.target.files[0]);
          formData.append('_token', $('meta[name="csrf_meta"]').attr('content'));
          $.ajax({
            url: url,
            type:"POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(result){
              console.log(result)
            },
            error: function(error){
              console.log(error)
            }
          })
        };
        fileReader.readAsDataURL(e.target.files[0]);
      })

    });
  </script>
@stop