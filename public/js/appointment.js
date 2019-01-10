let clickSave = false;
let classUnActive = 'btn-secondary';
let modeUpdate = 'update';
let modeCreate = 'create';

$(document).ready(function(){
    $('#formAppointment').find('button[type=submit]').on('click',function(){
        if(!clickSave){
            clickSave = true;
            let mode = $('input[name=mode]').val();
            if(modeCreate == mode){
                createAppointment($(this).closest('form'));
            }else{
                updateAppointment($(this).closest('form'));
            }
        }
        clickSave = false;
        return false;
    });
    $('#btn-new-appointment').on('click',function () {
        $('input[name=mode]').val(modeCreate);
        let form = $('#formAppointment');
        form.find('.modal-title').html('Create Visit Customer');
        form.find('.modal-footer .ladda-label').html('Create');
        form.attr('action',$('input#url_create').val());
        form.find('input[name=appointment_id]').val('');
        form.find('input[name=customer]').val('');
        // form.find('select[name=building_id]').val('');
        form.find('select[name=sale_person]').val('');
        form.find('textarea[name=notes]').val('');
        form.find('.appointment-status').find('button[value=0]').click();

        let currentDate = moment().format('YYYY-MM-DD');
        let currentTime = moment().format('HH:00');
        $('input[name=date_visit]').val(currentDate);
        $('input[name=time_visit]').val(currentTime);

        form.find('.btn-delete').hide();
        form.find('.rate-customer').hide();
    });
    eventStatus();
    selectedRow();
    eventDelete();
});

function eventStatus(){
    $('.appointment-status button').on('mouseover',function(){
        let active = $(this).attr('active');
        if(active != 'true'){
            let classActive = $(this).attr('classActive');
            $(this).removeClass(classUnActive);
            $(this).addClass(classActive);
        }
    });
    $('.appointment-status button').on('mouseout',function(){
        let active = $(this).attr('active');
        if(active != 'true'){
            let classActive = $(this).attr('classActive');
            $(this).removeClass(classActive);
            $(this).addClass(classUnActive);
        }
    });

    $('.appointment-status button').on('click',function(){
        $('.appointment-status button').each(function(){
            $(this).attr('active','false');
            $(this).removeClass($(this).attr('classActive'));
        });
        $(this).attr('active','true');
        $(this).removeClass(classUnActive);
        $(this).addClass($(this).attr('classActive'));
    });
}

function eventDelete(){
    $('#formAppointment .btn-delete').on('click',function () {
        let form = $('#formAppointment');
        let appointmentId = form.find('input[name=appointment_id]').val();
        let data = {appointment_id:appointmentId};
        let url = $('#url_delete').val();
        var params = {
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                window.location = form.attr('location');
            }
        };
        jQuery.ajax(params);
    });
}

function selectedRow(){
    $('.appointment-list tr .app-col-action button').on('click',function(){
        let appointmentId = $(this).closest('tr').attr('id');
        let data = {appointment_id:appointmentId};
        let url = $('#url_show_detail').val();
        var params = {
            type: 'GET',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                let form = $('#formAppointment');
                $('input[name=mode]').val(modeUpdate);
                form.find('.btn-delete').show();
                form.find('.rate-customer').show();
                form.find('.modal-title').html('Update Visit Customer');
                form.find('.modal-footer .ladda-label').html('Update');
                form.attr('action',$('input#url_update').val());
                form.find('input[name=appointment_id]').val(data.id);
                // form.find('input[name=customer]').val(data.full_name);
                form.find('select[name=customer_id]').val(data.customer_id);
                form.find('select[name=building_id]').val(data.building_id);
                form.find('input[name=date_visit]').val(data.date_visit);
                form.find('input[name=time_visit]').val(data.time_visit);
                form.find('select[name=sale_person]').val(data.sale_person_id);
                form.find('textarea[name=notes]').val(data.note);
                form.find('.appointment-status').find('button[value='+data.status+']').click();
                form.find('.rate-customer .rate-comment').html(data.rate_comment);
                let rate = form.find('.rate-customer .rate');
                rate.html('');
                for(let i = 0; i < data.rate ; i ++){
                    rate.append('<span class="fa fa-star checked"></span>');
                }
                for(let i = data.rate; i < 5 ; i ++){
                    rate.append('<span class="fa fa-star"></span>');
                }
                $("#appointmentModal").modal();
            }
        };
        jQuery.ajax(params);
    })
}

function createAppointment(form){
    event.preventDefault();
    let myform = form[0];
    if (!myform.checkValidity()) {
        if (myform.reportValidity) {
            myform.reportValidity();
            return false;
        } else {
            //warn IE users somehow
        }
    }
    // if (form.valid()){
        let customer = form.find('input[name=customer]').val();
        let customerId = form.find('select[name=customer_id]').val();
        let buildingId = form.find('select[name=building_id]').val();
        let scheduleDate = form.find('input[name=date_visit]').val();
        let scheduleTime = form.find('input[name=time_visit]').val();
        let salePerson = form.find('select[name=sale_person]').val();
        let notes = form.find('textarea[name=notes]').val();
        let status = form.find('.appointment-status').find('button[active=true]').attr('value');
        let data = {
            customer_id : customerId,
            customer_name : customer,
            building_id: buildingId,
            schedule_date: scheduleDate,
            schedule_time: scheduleTime,
            sale_person: salePerson,
            notes: notes,
            status: status
        }
        let url = form.attr('action');
        var params = {
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                window.location = form.attr('location');
            }
        };
        jQuery.ajax(params);
    // }
}

function updateAppointment(form){
    event.preventDefault();
    let myform = form[0];
    if (!myform.checkValidity()) {
        if (myform.reportValidity) {
            myform.reportValidity();
            return false;
        } else {
            //warn IE users somehow
        }
    }
    // if (form.valid()){
    let appointmentId = form.find('input[name=appointment_id]').val();
    let customer = form.find('input[name=customer]').val();
    let customerId = form.find('select[name=customer_id]').val();
    let buildingId = form.find('select[name=building_id]').val();
    let scheduleDate = form.find('input[name=date_visit]').val();
    let scheduleTime = form.find('input[name=time_visit]').val();
    let salePerson = form.find('select[name=sale_person]').val();
    let notes = form.find('textarea[name=notes]').val();
    let status = form.find('.appointment-status').find('button[active=true]').attr('value');
    let data = {
        appointment_id: appointmentId,
        customer_name : customer,
        customer_id : customerId,
        building_id: buildingId,
        schedule_date: scheduleDate,
        schedule_time: scheduleTime,
        sale_person: salePerson,
        notes: notes,
        status: status
    }
    let url = form.attr('action');
    var params = {
        type: 'POST',
        url: url,
        data: data,
        dataType: 'json',
        success: function(data) {
            window.location = form.attr('location');
        }
    };
    jQuery.ajax(params);
    // }
}


