<?php use App\Common\Constant; use App\Common\AppCommon; ?>
<style>
    #appointmentModal .modal-footer .btn-delete{
        justify-content: flex-start;
        margin-right: 72%;
    }
</style>

<div class="modal fade" id="searchOfficeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-primary" role="document">
        <div class="modal-content">
            <form class="inline" action="" method="post" id="formCustomer">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Search Office</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-12">
                            <label class="col-form-label font-weight-bold" for="building_id">Building</label>
                            @include('common.__select_building',['selectName' => 'building_id'])
                        </div>
                        <div class="col-xl-4 col-md-12">
                            @include('common.tagHtml.__input_text',[
                               'labelInput' => 'Office Name',
                               'inputName' => 'office_name',
                               'placeHolder' => 'Office name'
                           ])
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <label class="col-form-label font-weight-bold" for="floor">Floor</label>
                            @include('common.__select_floor_office_2-1',['selectName' => 'floor', 'defaultValue' => ''])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    List Office
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered datatable dataTable no-footer" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                        <thead>
                                        <tr role="row">
                                            <th class="no">
                                                No.
                                            </th>
                                            <th class="office-name">
                                                Office Name
                                            </th>
                                            <th class="building">
                                                Building
                                            </th>
                                            <th class="floor">
                                                Floor
                                            </th>
                                            <th class="acreage-rent">
                                                Acreage Rent
                                            </th>
                                            <th class="action">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--@foreach($customers as $index => $customer)--}}
                                            {{--<tr>--}}
                                                {{--<td class="no">{{$index+1}}</td>--}}
                                                {{--<td class="full_name">{{$customer->full_name}}</td>--}}
                                                {{--<td class="mobile_phone">{{$customer->mobile_phone}}</td>--}}
                                                {{--<td class="email">{{$customer->email}}</td>--}}
                                                {{--<td class="text-center">--}}
                                                    {{--<div class="form-check form-check-inline mr-1">--}}
                                                        {{--<input class="form-check-input" id="radio{{$customer->id}}" type="radio" value="{{$customer->id}}" name="customer_id">--}}
                                                        {{--<label class="form-check-label" for="radio{{$customer->id}}">Chose</label>--}}
                                                    {{--</div>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                        {{--@endforeach--}}
                                        </tbody>
                                    </table>
                                    <div style="display: none" id="templateOfficeRecord">
                                        <table>
                                            <tr>
                                                <td class="no">1</td>
                                                <td class="office-name">office</td>
                                                <td class="building">building</td>
                                                <td class="floor">floor</td>
                                                <td class="acreage-rent text-right"></td>
                                                <td class="text-center chose">
                                                    <div class="form-check form-check-inline mr-1">
                                                        <input class="form-check-input" id="radio-1" type="radio" value="" name="office_id">
                                                        <input type="hidden" value="" name="price">
                                                        <label class="form-check-label" for="radio-1">Chose</label>
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
                    <button class="btn btn-primary" type="button" onclick="return false;" id="btn-selected-office" formnovalidate>
                        <span class="ladda-label">Chose</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    let urlSearchOffice = "{{route('office.search')}}";
    $(document).ready(function(){
        $( "#searchOfficeModal" ).on('shown.bs.modal', function(){
            changeSearchOffice();
        });
        $('#searchOfficeModal select[name=building_id]').on('change',function(){
            changeSearchOffice();
        });
        $('#searchOfficeModal input[name=office_name]').on('change',function(){
            changeSearchOffice();
        });
        $('#searchOfficeModal select[name=floor]').on('change',function(){
            changeSearchOffice();
        });

        $('#btn-selected-office').on('click',function(){
            $('input[name=office_id]').each(function(){
                if($(this).prop('checked')){
                    let trData = $(this).closest('tr');
                    let office_name = trData.find('.office-name').html();
                    let building_name = trData.find('.building').html();
                    let floor = trData.find('.floor').html();
                    let acreage_rent = trData.find('.acreage-rent').html();
                    let price = trData.find('input[name=price]').val();
                    let office_id = $(this).val();
                    $("#searchOfficeModal").modal('toggle');
                    return returnSelectOffice(office_name, building_name, floor, acreage_rent, price, office_id);
                }
            });
        })
    });

    function changeSearchOffice(){
        let buildingId = $('#searchOfficeModal select[name=building_id]').val();
        let officeName = $('#searchOfficeModal input[name=office_name]').val();
        let floor = $('#searchOfficeModal select[name=floor]').val();
        let url = urlSearchOffice;
        let data = {building_id : buildingId, office_name : officeName, floor : floor};
        var params = {
            type: 'GET',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                console.log(data);
                let tbody = $('#searchOfficeModal table.table tbody');
                tbody.html('');
                if(data.data.length > 0){
                    $indexOffice = 1;
                    data.data.forEach(function(office){
                        let dataRecord = $('#templateOfficeRecord').clone(true);
                        dataRecord.find('.no').html($indexOffice);
                        dataRecord.find('.office-name').html(office.office_name);
                        dataRecord.find('.building').html(office.building_name);
                        dataRecord.find('.floor').html(office.floor_name);
                        dataRecord.find('.acreage-rent').html(office.acreage_rent + ' m2');
                        dataRecord.find('.form-check-input').attr('id','radio-' + office.id);
                        dataRecord.find('.form-check-label').attr('for','radio-' + office.id);
                        dataRecord.find('.form-check-input').val(office.id);
                        dataRecord.find('input[name=price]').val(150 + ' $');
                        tbody.append(dataRecord.find('tbody').html());
                        $indexOffice++;
                    })
                }
            }
        };
        jQuery.ajax(params);
    }
</script>
