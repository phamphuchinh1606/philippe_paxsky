<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> List Office
        <div class="card-header-actions">
            <a class="btn btn-sm btn-secondary" href="{{route('contract.index')}}">
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
                            Office Name
                        </th>
                        <th class="contract-number">
                            Rent Acreage
                        </th>
                        <th class="company-name">
                            Price
                        </th>
                        <th class="charge-user">
                            Amount
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
