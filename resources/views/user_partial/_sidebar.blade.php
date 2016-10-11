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
</div>

<form method="post" action="{{route('upload_image')}}" enctype="multipart/form-data"
      id="profile-image-upload">
    {{csrf_field()}}
    {{method_field('POST')}}
    <label for="upload">
        <input type="file" id="upload" style="display: none" name="file">
    </label>

</form>




@section('extra_js')
    <script type="text/javascript">

        $(document).ready(function() {
                    $("#rp-image-button").click(function () {
                        console.log("msg");
                        $("#upload").click();

                    });

                    document.getElementById("upload").onchange = function () {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            // get loaded data and render thumbnail.
                            document.getElementById("image").src = e.target.result;
                            // Place ajax call
                            var formElementObject = $('#profile-image-upload');
                            var formElement = document.querySelector('form');
                            console.log(formElement[0]);
                            $.ajax({
                                url: formElementObject.attr('action'),
                                type:'POST',
                                processData: false, // theme 2 are important while sending
                                contentType: false, // image data
                                data: new FormData(formElement),
                                success: function(result){
                                    console.log(result)
                                },
                                error: function(error){
                                    console.log(error)
                                }
                            })


                            // end ajax call



                        };

                        // read the image file as a data URL.
                        reader.readAsDataURL(this.files[0]);
                    };
                }
        );
    </script>
@stop