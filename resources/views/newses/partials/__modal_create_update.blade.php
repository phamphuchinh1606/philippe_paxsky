<?php use App\Common\Constant; ?>
<style>
    #newsModal .modal-footer .btn-delete{
        justify-content: flex-start;
        margin-right: 72%;
    }
</style>
<div class="modal fade" id="newsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-primary" role="document">
        <div class="modal-content">
            <form class="inline" action="{{route('news.create')}}" location="{{route('news.index')}}" method="post" id="formNews">
                @csrf
                <input type="hidden" name="news_id" value="">
                <input type="hidden" name="mode" value="create">
                <div class="modal-header">
                    <h4 class="modal-title">Create News</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-left: 2rem;padding-right: 2rem">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Title',
                               'inputName' => 'title',
                               'placeHolder' => 'Title',
                               'inputValue' => '',
                               'required' => true,
                               'showHorizontal' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Url News',
                               'inputName' => 'url_news',
                               'placeHolder' => 'Url new',
                               'inputValue' => '',
                               'required' => true,
                               'showHorizontal' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Image Url',
                               'inputName' => 'image_url',
                               'placeHolder' => 'Image url',
                               'inputValue' => '',
                               'required' => true,
                               'showHorizontal' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__input_date',[
                               'labelInput' => 'Public Date',
                               'inputName' => 'public_date',
                               'placeHolder' => 'Public date',
                               'inputValue' => '',
                               'required' => true,
                               'showHorizontal' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__check_box_on_of',[
                                'labelInput' => 'Special',
                               'inputName' => 'news_special',
                               'inputValue' => 0,
                               'showHorizontal' => true
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__check_box_on_of',[
                                'labelInput' => 'Status Public',
                               'inputName' => 'status',
                               'inputValue' => 1,
                               'showHorizontal' => true
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="row">
                                <label class="col-md-2 col-form-label font-weight-bold" for="direction">Content</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="notes" rows="5" placeholder="Content.."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-delete" type="button">Delete</button>
                    <button class="btn btn-secondary name-cancel pull-right" type="button" data-dismiss="modal">Cancel</button>

                    <button class="btn btn-primary" type="submit" formnovalidate>
                        <span class="ladda-label">Save</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
