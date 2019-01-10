<?php use App\Common\Constant; ?>
<style>
    #appointmentModal .modal-footer .btn-delete{
        justify-content: flex-start;
        margin-right: 72%;
    }
</style>
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-primary" role="document">
        <div class="modal-content">
            <form class="inline" action="{{route('appointment.create')}}" location="{{route('appointment.index')}}" method="post" id="formAppointment">
                @csrf
                <input type="hidden" name="appointment_id" value="">
                <input type="hidden" name="mode" value="create">
                <div class="modal-header">
                    <h4 class="modal-title">Create Visit Customer</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{--<div class="col-xl-12 col-md-12">--}}
                            {{--@include('common.tagHtml.__input_text',[--}}
                               {{--'labelInput' => 'Customer Name',--}}
                               {{--'inputName' => 'customer',--}}
                               {{--'placeHolder' => 'Customer name',--}}
                               {{--'inputValue' => '',--}}
                               {{--'required' => true--}}
                           {{--])--}}
                        {{--</div>--}}
                        <div class="col-xl-12 col-md-12">
                            <label class="col-form-label font-weight-bold" for="direction">Customer</label>
                            @include('common.customers.__select_customer',['selectName' => 'customer_id', 'required' => true])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <label class="col-form-label font-weight-bold" for="direction">Building</label>
                            @include('common.__select_building',['selectName' => 'building_id', 'defaultValue' => '','required' => true])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-md-12">
                            @include('common.tagHtml.__input_date',[
                               'labelInput' => 'Date Visit',
                               'inputName' => 'date_visit',
                               'placeHolder' => 'Date visit',
                               'required' => true,
                               'inputValue' => '',
                               'required' => true
                           ])
                        </div>
                        <div class="col-xl-6 col-md-12">
                            @include('common.tagHtml.__input_time',[
                               'labelInput' => 'Time Visit',
                               'inputName' => 'time_visit',
                               'placeHolder' => 'Time visit',
                               'required' => true,
                               'inputValue' => '',
                               'required' => true
                           ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <label class="col-form-label font-weight-bold" for="direction">Sale Person</label>
                            @include('common.users.__select_user_sale',['selectName' => 'sale_person'])
                        </div>
                    </div>
                    <div class="row rate-customer">
                        <div class="col-xl-3 col-md-12">
                            <label class="col-form-label font-weight-bold" for="direction">Rate</label>
                            <div class="form-group rate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-12">
                            <label class="col-form-label font-weight-bold" for="direction">Rate Comment</label>
                            <div class="form-group">
                                <label class="rate-comment">Noi dung comment</label>
                            </div>
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
                            <label class="col-form-label font-weight-bold" for="direction">Notes</label>
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
