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
                                                <td class="no">{{$index+1}}</td>
                                                <td class="full_name">{{$customer->full_name}}</td>
                                                <td class="mobile_phone">{{$customer->mobile_phone}}</td>
                                                <td class="email">{{$customer->email}}</td>
                                                <td class="text-center">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" id="radio{{$customer->id}}" type="radio" value="{{$customer->id}}" name="customer_id">
                                                        <label class="form-check-label" for="radio{{$customer->id}}">Chose</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div style="display: none" id="templateRecord">
                                        <table>
                                            <tr>
                                                <td class="no">1</td>
                                                <td class="full_name">full name</td>
                                                <td class="mobile_phone">mobile phone</td>
                                                <td class="email">email</td>
                                                <td class="text-center chose">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" id="radio{{$customer->id}}" type="radio" value="{{$customer->id}}" name="customer_id">
                                                        <label class="form-check-label" for="radio{{$customer->id}}">Chose</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    {{--<button class="btn btn-danger btn-delete" type="button">Delete</button>--}}
                    <button class="btn btn-secondary name-cancel pull-right" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button" onclick="return false;" id="btn-selected" formnovalidate>
                        <span class="ladda-label">Chose</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    let urlSearchCustomer = "{{route('customer.search')}}";
    $(document).ready(function(){
        $('#searchCustomerModal input[name=full_name]').on('change',function(){
            changeSearch();
        });
        $('#searchCustomerModal input[name=email]').on('change',function(){
            changeSearch();
        });
        $('#searchCustomerModal input[name=phone_number]').on('change',function(){
            changeSearch();
        });

        $('#btn-selected').on('click',function(){
            $('input[name=customer_id]').each(function(){
                if($(this).prop('checked')){
                    let trData = $(this).closest('tr');
                    let full_name = trData.find('.full_name').html();
                    let phone_number = trData.find('.mobile_phone').html();
                    let email = trData.find('.email').html();
                    let customerId = $(this).val();
                    $("#searchCustomerModal").modal('toggle');
                    return returnSelectCustomer(full_name, phone_number, email, customerId);
                }
            });
        })
    });

    function changeSearch(){
        let fullName = $('#searchCustomerModal input[name=full_name]').val();
        let email = $('#searchCustomerModal input[name=email]').val();
        let phoneNumber = $('#searchCustomerModal input[name=phone_number]').val();
        let url = urlSearchCustomer;
        let data = {full_name : fullName, email : email, phone_number:phoneNumber}
        var params = {
            type: 'GET',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                let tbody = $('#searchCustomerModal table.table tbody');
                tbody.html('');
                if(data.data.length > 0){
                    $indexCustomer = 1;
                    data.data.forEach(function(customer){
                        let dataRecord = $('#templateRecord').clone(true);
                        dataRecord.find('.no').html($indexCustomer);
                        dataRecord.find('.full_name').html(customer.first_name + ' ' + customer.last_name);
                        dataRecord.find('.mobile_phone').html(customer.mobile_phone);
                        dataRecord.find('.email').html(customer.email);
                        dataRecord.find('.form-check-input').attr('id','radio' + customer.id);
                        dataRecord.find('.form-check-label').attr('for','radio' + customer.id);
                        dataRecord.find('.form-check-label').val(customer.id);
                        tbody.append(dataRecord.find('tbody').html());
                        $indexCustomer++;
                    })
                }
            }
        };
        jQuery.ajax(params);
    }
</script>
