<div class="card">
    <div class="card-header">
        <strong>Location Building</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="province">Province</label>
                    <input class="form-control" id="province" type="text"
                           name="province" placeholder="Province">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="district">District</label>
                    <input class="form-control" id="district" type="text"
                           name="district" placeholder="District">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="address">Address</label>
                    <input class="form-control" id="address" type="text" name="address"
                           placeholder="Address">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="direction">Direction</label>
                    @include('common.__select_direction',['selectName' => 'direction'])
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="long">Long</label>
                    <input class="form-control text-right" id="long" type="text"
                           name="long" placeholder="Long">
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="lat">Lat</label>
                    <input class="form-control text-right" id="lat" type="text"
                           name="lat" placeholder="Lat">
                </div>
            </div>
        </div>
    </div>
</div>
