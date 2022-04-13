<div class="card card-primary">
    <div class="card-header">
        <h4 class="card-title w-100">
            <a class="d-block w-100" data-toggle="collapse-no" href="#bookingSitePrices" aria-expanded="true">
                Booking.com Prices
            </a>
        </h4>
    </div>
    <!-- /.card-header -->
    <div id="bookingSitePrices" class="collapse-no" data-parent="#accordion">
        <div class="card-body table-responsive">
            <section class="primary">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Price Per KMs (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fPricePerKM_booking" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fPricePerKM_booking : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Price Per Hour (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fPricePerMin_booking" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fPricePerMin_booking : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Minimum Fare (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iMinFare_booking" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iMinFare_booking : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Base Fare (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iBaseFare_booking" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iBaseFare_booking : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Rider Cancellation Time Limit ( in minute ):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iCancellationTimeLimit_booking" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iCancellationTimeLimit_booking : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Waiting Time Limit ( in minute ):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="iWaitingFeeTimeLimit_booking" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iWaitingFeeTimeLimit_booking : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Waiting Charges (Price In EUR):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fWaitingFees_booking" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fWaitingFees_booking : "";  ?>">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.card-body -->
    </div>
</div>