<?php use App\Common\ImageCommon; use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Image
        <small>slides only</small>
    </div>
    <div class="card-body">
        <div class="box box-warning">
            <div class="box-body">
                <div class="upload__area-image">
                    <span>
                        @if(isset($office->id))
                            <img id="imgHandle"
                                 src="{{ImageCommon::showImage(AppCommon::showValueOld('main_image',$office->image_src))}}">
                        @else
                            <img id="imgHandle"
                                 src="{{asset('images/no_image_available.jpg')}}">
                        @endif

                        <label for="imgAnchorInput">Upload image</label>
                    </span>
                    <p>
                        <small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)
                        </small>
                    </p>
                </div>
                <div class="form__upload">

                    <div class="form-inline-simple">
                        <input type="file" class="'form-control" id="imgAnchorInput"
                               onchange="loadFile(event)">
                    </div>
                    <script>
                        var loadFile = function (event) {
                            var output = document.getElementById('imgHandle');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            document.getElementById('image_src').files = event.target.files;
                        };
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
