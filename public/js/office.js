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
                    if("image_src" == property){
                        continue;
                    }
                    let input = $('input[name='+property+']');
                    if( input != undefined && input != null && input.is('input')){
                        input.val(data[property]);
                    }
                    let select = $('select[name='+property+']');
                    if( select != undefined && select != null){
                        select.val(data[property]);
                    }
                }
                $('#imgHandle').attr('src',data.image_src_path);
                $('input[name=image_src_office_layout]').val(data.image_src);
                $('input[name=office_name]').val(data.layout_name);
            }
        };
        jQuery.ajax(params);
    });
    $('select[name=office_layout_id]').change();
});
