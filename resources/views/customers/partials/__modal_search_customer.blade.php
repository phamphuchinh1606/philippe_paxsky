<?php use App\Common\Constant; use App\Common\AppCommon; ?>
<style>
    #appointmentModal .modal-footer .btn-delete{
        justify-content: flex-start;
        margin-right: 72%;
    }
</style>
<div class="modal fade" id="searchCustomerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-primary" role="document">
        <div class="modal-content">
            <form class="inline" action="{{route('customer.create')}}" method="post" id="formCustomer">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Search Customer</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-12">
                            @include('common.tagHtml.__input_text',[
                                'labelInput' => 'Full Name',
                                'inputName' => 'full_name',
                                'placeHolder' => 'Full Name'
                            ])
                        </div>
                        <div class="col-xl-4 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Email',
                               'inputName' => 'email',
                               'placeHolder' => 'Email'
                           ])
                        </div>
                        <div class="col-xl-4 col-md-12">
                            @include('common.tagHtml.__input_text',[
                                'labelInput' => 'Phone Number',
                                'inputName' => 'phone_number',
                                'placeHolder' => 'Phone number'
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    List Customer
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                        <thead>
                                        <tr role="row">
                                            <th>
                                                No.
                                            </th>
                                            <th class="status">
                                                Customer Name
                                            </th>
                                            <th class="contract-number">
                                                Phone Number
                                            </th>
                                            <th class="company-name">
                                                Email
                                            </th>
                                            <th class="action">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $index => $customer)
                                            <tr>
                                                <td>{{$index+1}}</td>
                                                <td>{{$customer->full_name}}</td>
                                                <td>{{$customer->mobile_phone}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td class="text-center">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" id="inline-radio3" type="radio" value="{{$customer->id}}" name="inline-radios">
                                                        <label class="form-check-label" for="inline-radio3">Chose</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    {{--<button class="btn btn-danger btn-delete" type="button">Delete</button>--}}
                    <button class="btn btn-secondary name-cancel pull-right" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" formnovalidate>
                        <span class="ladda-label">Chose</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
