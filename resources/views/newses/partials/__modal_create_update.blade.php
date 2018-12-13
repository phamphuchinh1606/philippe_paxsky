<?php use App\Common\Constant; ?>
<style>
    #appointmentModal .modal-footer .btn-delete{
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
                    <h4 class="modal-title">Create Visit Customer</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Title',
                               'inputName' => 'title',
                               'placeHolder' => 'Title',
                               'inputValue' => '',
                               'required' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Url',
                               'inputName' => 'url',
                               'placeHolder' => 'Url',
                               'inputValue' => '',
                               'required' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Image',
                               'inputName' => 'image',
                               'placeHolder' => 'Image',
                               'inputValue' => '',
                               'required' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <label class="col-form-label font-weight-bold" for="direction">Status</label>
                            <div class="row appointment-status">
                                <div class="col-xl-3 col-md-6">
                                    <button class="btn btn-pill btn-block btn-warning" value="{{Constant::$APPOINTMENT_STATUS_PENDING}}" active="true" classActive="btn-warning" type="button">Pending</button>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <button class="btn btn-pill btn-block btn-secondary" value="{{Constant::$APPOINTMENT_STATUS_SCHEDULE}}" active="false" classActive="btn-primary" type="button">Scheduled</button>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <button class="btn btn-pill btn-block btn-secondary" value="{{Constant::$APPOINTMENT_STATUS_CANCEL}}" active="false" classActive="btn-danger" type="button">Cancelled</button>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <button class="btn btn-pill btn-block btn-secondary" value="{{Constant::$APPOINTMENT_STATUS_DONE}}" active="false" classActive="btn-dark" type="button">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <label class="col-form-label font-weight-bold" for="direction">Content</label>
                            <textarea class="form-control" name="notes" rows="3" placeholder="Content.."></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-delete" type="button">Delete</button>
                    <button class="btn btn-secondary name-cancel pull-right" type="button" data-dismiss="modal">Cancel</button>
                    {{--<button class="btn btn-primary btn-ladda ladda-button" data-style="expand-right" type="submit" onclick="return false;">--}}
                    {{--<span class="ladda-label">Save</span><span class="ladda-spinner"></span>--}}
                    {{--</button>--}}
                    <button class="btn btn-primary" type="submit" formnovalidate>
                        <span class="ladda-label">Save</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
