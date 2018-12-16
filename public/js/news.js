let clickSave = false;
let classUnActive = 'btn-secondary';
let modeUpdate = 'update';
let modeCreate = 'create';

$(document).ready(function(){
    $('#newsModal').find('button[type=submit]').on('click',function(){
        if(!clickSave){
            clickSave = true;
            let mode = $('input[name=mode]').val();
            if(modeCreate == mode){
                createNews($(this).closest('form'));
            }else{
                updateNews($(this).closest('form'));
            }
        }
        clickSave = false;
        return false;
    });
    $('#btn-new-appointment').on('click',function () {
        $('input[name=mode]').val(modeCreate);
        let form = $('#formNews');
        form.find('.modal-title').html('Create News');
        form.find('.modal-footer .ladda-label').html('Create');
        form.attr('action',$('input#url_create').val());
        form.find('input[name=news_id]').val('');
        form.find('input[name=title]').val('');
        form.find('input[name=url_news]').val('');
        form.find('input[name=image_url]').val('');
        form.find('textarea[name=notes]').val('');
        form.find('input[name=status]').attr('checked','checked');
        let currentDate = moment().format('YYYY-MM-DD');
        $('input[name=public_date]').val(currentDate);
        form.find('.btn-delete').hide();
    });
    selectedRow();
    eventDelete();
});

function eventDelete(){
    $('#formNews .btn-delete').on('click',function () {
        let form = $('#formNews');
        let newsId = form.find('input[name=news_id]').val();
        let data = {news_id:newsId};
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
    $('.news-list tr .app-col-action button').on('click',function(){
        let newsId = $(this).closest('tr').attr('id');
        let data = {news_id:newsId};
        let url = $('#url_show_detail').val();
        var params = {
            type: 'GET',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                let form = $('#formNews');
                form.find('.modal-title').html('Edit News');
                $('input[name=mode]').val(modeUpdate);
                form.attr('action',$('input#url_update').val());
                form.find('input[name=news_id]').val(data.id);
                form.find('input[name=title]').val(data.title);
                form.find('input[name=url_news]').val(data.url);
                form.find('input[name=image_url]').val(data.image);
                form.find('textarea[name=notes]').val(data.content);
                if(data.status_id == 0){
                    form.find('input[name=status]').removeAttr('checked');
                }else{
                    form.find('input[name=status]').attr('checked','checked');
                }
                if(data.news_special == 0){
                    form.find('input[name=news_special]').removeAttr('checked');
                }else{
                    form.find('input[name=news_special]').attr('checked','checked');
                }
                form.find('input[name=public_date]').val(data.public_date);
                $("#newsModal").modal();
            }
        };
        jQuery.ajax(params);
    })
}

function createNews(form){
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
    let title = form.find('input[name=title]').val();
    let urlNews = form.find('input[name=url_news]').val();
    let imageUrl = form.find('input[name=image_url]').val();
    let publicDate = form.find('input[name=public_date]').val();
    let newsSpecial = $('input[name=news_special]').prop("checked") ? 'On' : 'Off';
    let status = $('input[name=status]').prop("checked") ? 'On' : 'Off';
    let notes = form.find('textarea[name=notes]').val();

    let data = {
        title : title,
        url_news: urlNews,
        image_url: imageUrl,
        public_date: publicDate,
        news_special : newsSpecial,
        status: status,
        notes: notes
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
}

function updateNews(form){
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
    let newsId = form.find('input[name=news_id]').val();
    let title = form.find('input[name=title]').val();
    let urlNews = form.find('input[name=url_news]').val();
    let imageUrl = form.find('input[name=image_url]').val();
    let publicDate = form.find('input[name=public_date]').val();
    let newsSpecial = $('input[name=news_special]').prop("checked") ? 'On' : 'Off';
    let status = $('input[name=status]').prop("checked") ? 'On' : 'Off';
    let notes = form.find('textarea[name=notes]').val();
    let data = {
        news_id: newsId,
        title : title,
        url_news: urlNews,
        image_url: imageUrl,
        public_date: publicDate,
        news_special : newsSpecial,
        status: status,
        notes: notes
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


