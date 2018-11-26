jQuery(document).ready(function ($) {
    $('select[name=office_layout_id]').on('change',function(){
        let value = $(this).val();
        let url = $("#url-load-data").val();
        let data = {office_layout_id : value}
        var params = {
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            success: function(data) {
                for (var property in data) {
                    let input = $('input[name='+property+']');
                    if( input != undefined && input != null){
                        input.val(data[property]);
                    }
                    let select = $('select[name='+property+']');
                    if( select != undefined && select != null){
                        select.val(data[property]);
                    }
                }

            }
        };
        jQuery.ajax(params);
    })
});
