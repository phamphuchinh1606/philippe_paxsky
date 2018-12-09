let clickSave = false;
$formCustomer = $('#formCustomer');

$(document).ready(function(){

    $('#btn-new-customer').on('click',function () {
        $formCustomer.find('input[name=first_name]').val('');
        $formCustomer.find('input[name=last_name]').val('');
        $("#createCustomerModal").modal();
    });
});
