<select class="form-control province_control" name="{{$selectName}}">
    @foreach($provinces as $province)
        <option value="{{$province->id}}" data-code="{{$province->code}}" @if(isset($defaultValue) && $defaultValue == $province->id) selected @endif>
            {{$province->label}}
        </option>
    @endforeach
</select>

<script>
    $(document).ready(function(){
        @if(isset($changeProvince) && $changeProvince)
        $('.province_control').on('change',function(){
            if($('.district_control').is(":visible")){
                let districtControl = $('.district_control');
                let url = "{{route('common.address.change_province')}}";
                let provinceId = $(this).val();
                let provinceCode = $(this).find("option[value="+provinceId+"]").attr('data-code');
                let data = {province_id : provinceId,province_code : provinceCode}
                var params = {
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        districtControl.html('');
                        data.forEach(function(district){
                            let option = '<option value="'+district.id + '">'+district.label+'</option>'
                            districtControl.append(option);
                        })
                    }
                };
                jQuery.ajax(params);
            }
        })
        @endif
    });
</script>
