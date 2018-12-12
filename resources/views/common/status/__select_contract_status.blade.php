<select class="form-control" name="{{$selectName}}">
    <?php
        use App\Common\Constant;
        $contractStatuses = [
            Constant::$CONTRACT_STATUS_NEW =>  Constant::$CONTRACT_STATUS_NEW_NAME,
            Constant::$CONTRACT_STATUS_BOOKING =>  Constant::$CONTRACT_STATUS_BOOKING_NAME,
            Constant::$CONTRACT_STATUS_RENTED =>  Constant::$CONTRACT_STATUS_RENTED_NAME,
            Constant::$CONTRACT_STATUS_EXPIRED =>  Constant::$CONTRACT_STATUS_EXPIRED_NAME,
            Constant::$CONTRACT_STATUS_CANCELLED =>  Constant::$CONTRACT_STATUS_CANCELLED_NAME,
        ];
    ?>

    @foreach($contractStatuses as $key => $contractStatus)
        <option value="{{$key}}" @if(isset($defaultValue) && $defaultValue == $key) selected @endif>
            {{$contractStatus}}
        </option>
    @endforeach
</select>
