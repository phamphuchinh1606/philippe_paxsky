<?php use App\Common\AppCommon; ?>
<div class="card">
    <div class="card-header">
        <strong>Rental Cost Building Info</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="rental_cost">Rental Cost</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="rental_cost" name="rental_cost" size="16"
                                   type="number" step="0.1" value="{{AppCommon::showValueOld('rental_cost',$building->rental_cost)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$ / m2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="tax_cost">Tax Cost</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="tax_cost" name="tax_cost" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('tax_cost',$building->tax_cost)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$ / m2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="manager_cost">Manager Cost</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="manager_cost" name="manager_cost" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('manager_cost',$building->manager_cost)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$ / m2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="electricity_cost">Electricity Cost</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="electricity_cost" name="electricity_cost" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('electricity_cost',$building->electricity_cost)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">K/W hours</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="over_time_cost">Over Time Cost</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="over_time_cost" name="over_time_cost" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('over_time_cost',$building->over_time_cost)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="parking_fee_car">Parking Fee Car</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="parking_fee_car" name="parking_fee_car" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('parking_fee_car',$building->parking_fee_car)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="parking_fee_bike">Parking Fee MotoBike</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="parking_fee_bike" name="parking_fee_bike" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('parking_fee_bike',$building->parking_fee_bike)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="contract_duration">Contract Duration</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="contract_duration" name="contract_duration" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('contract_duration',$building->contract_duration)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Years</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="mode_of_deposit">Mode of Deposit</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="mode_of_deposit" name="mode_of_deposit" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('mode_of_deposit',$building->mode_of_deposit)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Months</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="mode_of_payment">Mode Of Payment</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="mode_of_payment" name="mode_of_payment" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('mode_of_payment',$building->mode_of_payment)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Months</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="form-group">
                    <label class="col-form-label" for="number_of_vehicles">Number Of Vehicles</label>
                    <div class="controls">
                        <div class="input-prepend input-group">
                            <input class="form-control text-right" id="number_of_vehicles" name="number_of_vehicles" size="16" type="number" step="0.1"
                                   value="{{AppCommon::showValueOld('number_of_vehicles',$building->number_of_vehicles)}}">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Bikes/Floor</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
