<div class="card">
    <div class="card-header">
        <strong>Building Content</strong>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="text-input">Mô tả ngắn sản
                phẩm</label>
            <div class="col-md-10">
                <textarea class="form-control" name="product_description" rows="9"
                          placeholder="Nhập mô tả ngắn thông tin sản phẩm"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-form-label" for="text-input">Nội dung sản
                phẩm</label>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" value="" class="editor"
                               name="product_content"/>
                        <div id="editor"
                             class="ql-container ql-snow editor_quill product_content">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
