@if(isset($showHorizontal))
    <div class="form-group row">
        <label class="col-md-2 col-form-label font-weight-bold" for="{{$inputName}}">{{$labelInput}}</label>
        <div class="col-md-10">
            <div class="upload__area-image">
                    <span>
                        <img id="imgHandle"
                             src="{{\App\Common\ImageCommon::showImage(\App\Common\AppCommon::showValueOld($inputName,$inputValue))}}">
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
                        document.getElementById('building_main_image').files = event.target.files;
                    };
                </script>
            </div>
        </div>
    </div>
@else
    <div class="form-group">
        <label class="col-form-label font-weight-bold" for="{{$inputName}}">{{$labelInput}}</label>
        <div class="upload__area-image">
                    <span>
                        <img id="imgHandle"
                             src="{{\App\Common\ImageCommon::showImage(\App\Common\AppCommon::showValueOld($inputName,$inputValue))}}">
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
                    document.getElementById('building_main_image').files = event.target.files;
                };
            </script>
        </div>
    </div>
@endif


