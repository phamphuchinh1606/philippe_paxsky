<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Danh sách hình ảnh phụ
        <small>slides only</small>
    </div>
    <div class="card-body">
        <div class="carousel slide" id="carouselExampleSlidesOnly" data-ride="carousel">
            <div class="row">
                <div class="col-sm-12">
                    <form method="post" action="{{route('common.upload_image')}}"
                          enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                        {{ csrf_field() }}
                        <div class="dz-message">
                            <div class="col-xs-8">
                                <div class="message">
                                    <p>Kéo thả file image hoặc click để upload</p>
                                </div>
                            </div>
                        </div>
                        <div class="fallback">
                            <input type="file" name="file">
                        </div>
                    </form>
                </div>
            </div>
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
