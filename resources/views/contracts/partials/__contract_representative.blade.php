<?php use App\Common\AppCommon; ?>

<script>
    $(document).ready(function(){
        eventDeleteCustomer();
    });

    function eventDeleteCustomer(){
        $('.table-customer a.delete-customer').on('click',function(){
            let trItem = $(this).closest('tr');
            trItem.remove();
        });
    }

    function returnSelectCustomer(full_name, phone_number, email, customer_id){
        let tbodyTable = $('table.table-customer tbody');
        let bAdd = true;
        tbodyTable.find('input[name=customer_id]').each(function(){
            let id = $(this).val();
            if(id == customer_id){
                bAdd = false;
            }
        });
        if(bAdd){
            let dataRecord = $('#templateRecordCustomer').clone();
            dataRecord.find('.full_name').html(full_name);
            dataRecord.find('.mobile_phone').html(phone_number);
            dataRecord.find('.email').html(email);
            dataRecord.find('input.customer_id').val(customer_id);
            tbodyTable.append(dataRecord.find('tbody').html());
            eventDeleteCustomer();
        }
    }
</script>
<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> List Representative
        <div class="card-header-actions">
            <a data-toggle="modal" class="btn btn-outline-success active"
               href="#searchCustomerModal" id="btn-new-appointment">
                Search Customer
            </a>
            <a data-toggle="modal" class="btn btn-outline-primary active"
               href="#createCustomerModal" id="btn-new-appointment">
                Add Customer
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <table class="table table-customer appointment-list table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                    <thead>
                    <tr role="row">
                        <th class="status">
                            Customer Name
                        </th>
                        <th class="contract-number">
                            Phone Number
                        </th>
                        <th class="company-name">
                            Email
                        </th>
                        <th class="charge-user">
                           Position
                        </th>
                        <th class="action">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($contract->customers))
                        @foreach($contract->customers as $index => $customer)
                            @if(isset($customer->customer))
                                <tr>
                                    <td class="full_name">{{$customer->customer->first_name . ' ' . $customer->customer->last_name}}</td>
                                    <td class="mobile_phone">{{$customer->customer->mobile_phone}}</td>
                                    <td class="email">{{$customer->customer->email}}</td>
                                    <td></td>
                                    <td class="text-center">
                                        <a class="delete-customer" href="#">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        <input type="hidden" class="customer_id" name="customer_id[]" value="{{$customer->customer->id}}" />
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif

                    </tbody>
                </table>
                <div style="display: none" id="templateRecordCustomer">
                    <table>
                        <tr>
                            <td class="full_name"></td>
                            <td class="mobile_phone"></td>
                            <td class="email"></td>
                            <td></td>
                            <td class="text-center">
                                    <a class="delete-customer" href="#">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <input type="hidden" class="customer_id" name="customer_id[]" value="" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
