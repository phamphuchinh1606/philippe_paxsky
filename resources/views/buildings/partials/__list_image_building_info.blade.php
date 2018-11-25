<?php use App\Common\ImageCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> List Sub Image
        <small>slides only</small>
        @if(isset($building->id))
            <button class="btn btn-primary pull-right" type="button" data-toggle="collapse" data-target="#collapseAddImage"
                    aria-expanded="true" aria-controls="collapseExample"
                    data-placement="top" data-toggle="tooltip" title data-original-title="Add Image">
                <i class="fa fa-upload fa-lg"></i>
            </button>
        @endif
    </div>
    <div class="card-body">
        <div class="carousel slide" id="carouselExampleSlidesOnly" data-ride="carousel">
            @if(!isset($building->id))
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="{{route('common.upload_image')}}"
                              enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                            {{ csrf_field() }}
                            <div class="dz-message">
                                <div class="col-xs-8">
                                    <div class="message">
                                        <p>Drag the image file or click to upload</p>
                                    </div>
                                </div>
                            </div>
                            <div class="fallback">
                                <input type="file" name="file">
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="form-group row">
                    <div class="col-md-12 collapse" id="collapseAddImage">
                        <form action="{{route('building.image.add',['buildingId' => $building->id])}}"
                              method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="text-right p-sm-1" id="btn_add_image" style="display: none">
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </div>
                            <div class="upload__area-image">
                                <span>
                                    <img id="imgAdd" src="http://beats-city.amagumolabs.io/images/upload/no_image_available.jpg">
                                    <label for="imageFileAdd">Upload image</label>
                                </span>
                                <p><small>(Please upload a file of type: jpeg, png, jpg, gif, svg.)</small></p>
                            </div>
                            <div class="form__upload">
                                <div class="form-inline-simple">
                                    <input type="file" name="image_add" class="form-control imgAnchorInput" id="imageFileAdd" onchange="loadFileImage(event)">
                                </div>
                                <script>
                                    var loadFileImage = function(event) {
                                        var output = document.getElementById('imgAdd');
                                        console.log(output);
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        document.getElementById('btn_add_image').style.display = 'block';
                                    };
                                </script>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    @foreach($building->images as $image)
                        <div class="col-md-6">
                            <img src="{{ImageCommon::showImage($image->src_image)}}" style="width: 100%"/>
                            <div>
                                <a data-toggle="modal" class="nav-link delete-image anchorClick"
                                   data-url="{{route('building.image.delete',['buildingId' => $building->id, 'id' => $image->id]) }}"
                                   data-name="Image" href="#deleteModal">
                                    Delete Image
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            {{--Dropzone Preview Template--}}
            <div id="preview" style="display: none;">

                <div class="dz-preview dz-file-preview">
                    <div class="dz-image"><img data-dz-thumbnail/></div>

                    <div class="dz-details">
                        <div class="dz-size"><span data-dz-size></span></div>
                        <div class="dz-filename"><span data-dz-name></span></div>
                    </div>
                    <div class="dz-progress"><span class="dz-upload"
                                                   data-dz-uploadprogress></span></div>
                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                    <div class="dz-success-mark">
                    </div>
                    <div class="dz-error-mark">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
