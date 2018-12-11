<?php use App\Common\AppCommon; ?>

<script>
    $(document).ready(function(){
        eventDeleteOffice();
    });

    function eventDeleteOffice(){
        $('.table-customer a.delete-office').on('click',function(){
            let trItem = $(this).closest('tr');
            trItem.remove();
        });
    }

    function returnSelectOffice(office_name, building_name, floor, acreage_rent, price, office_id){
        let tbodyTable = $('table.table-office tbody');
        let bAdd = true;
        tbodyTable.find('input[name=office_id]').each(function(){
            let id = $(this).val();
            if(id == office_id){
                bAdd = false;
            }
        });
        if(bAdd){
            let dataRecord = $('#templateRecordOffice').clone();
            dataRecord.find('.office_name').html(office_name);
            dataRecord.find('.floor').html(floor);
            dataRecord.find('.acreage_rent').html(acreage_rent);
            dataRecord.find('.price').html(price);
            dataRecord.find('input.office_id').val(office_id);
            tbodyTable.append(dataRecord.find('tbody').html());
            eventDeleteOffice();
        }
    }
</script>

<div class="card">
    <div class="card-header">
        <i class="icon-note"></i> List Office
        <div class="card-header-actions">
            <a data-toggle="modal" class="btn btn-outline-primary active"
               href="#searchOfficeModal" id="btn-new-appointment">
                Search Office
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <table class="table table-office table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                    <thead>
                    <tr role="row">
                        <th>
                            Office Name
                        </th>
                        <th>
                            Floor
                        </th>
                        <th>
                            Rent Acreage
                        </th>
                        <th>
                            Price
                        </th>
                        <th class="action">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($contract->offices))
                        @foreach($contract->offices as $index => $office)
                            <tr>
                                <td class="office_name">{{$office->office->office_name}}</td>
                                <td class="floor">{{$office->office->floorName}}</td>
                                <td class="acreage_rent text-right">{{$office->office->acreage_rent}}</td>
                                <td class="price text-right">{{$office->rent_cost}}</td>
                                <td class="text-center">
                                    <a class="delete-office" href="#">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    <input type="hidden" class="office_id" name="office_id[]" value="" />
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <div style="display: none" id="templateRecordOffice">
                    <table>
                        <tr>
                            <td class="office_name"></td>
                            <td class="floor"></td>
                            <td class="acreage_rent text-right"></td>
                            <td class="price text-right"></td>
                            <td class="text-center">
                                <a class="delete-office" href="#">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                <input type="hidden" class="office_id" name="office_id[]" value="" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
