<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <strong>Building Content</strong>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="text-input">Note</label>
            <div class="col-md-10">
                <textarea class="form-control" name="notes" rows="3"
                          placeholder="Input Note">{{AppCommon::showValueOld('notes',$building->notes)}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="text-input">Mô tả ngắn sản
                phẩm</label>
            <div class="col-md-10">
                <textarea class="form-control" name="description" rows="9"
                          placeholder="Nhập mô tả ngắn thông tin sản phẩm">{{AppCommon::showValueOld('description',$building->description)}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="text-input">Nội dung sản
                phẩm</label>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" value="{{AppCommon::showValueOld('building_content',$building->content)}}" class="editor"
                               name="building_content"/>
                        <div id="editor"
                             class="ql-container ql-snow editor_quill building_content">
                            {!! AppCommon::showValueOld('building_content',$building->content) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
