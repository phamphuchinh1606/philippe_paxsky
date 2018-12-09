<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> List Representative
        <div class="card-header-actions">
            <a data-toggle="modal" class="btn btn-outline-primary active"
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
                <table class="table appointment-list table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
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
                        <th class="charge-user">
                           Position
                        </th>
                        <th class="action">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contract->customers as $index => $customer)

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
