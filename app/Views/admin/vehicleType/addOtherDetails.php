<div class="card card-primary">
    <div class="card-header">
        <h4 class="card-title w-100">
            <a class="d-block w-100" data-toggle="collapse-no" href="#otherDetails" aria-expanded="true">
                Other Details
            </a>
        </h4>
    </div>
    <!-- /.card-header -->
    <div id="otherDetails" class="collapse-no" data-parent="#accordion">
        <div class="card-body table-responsive">
            <section class="primary">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Commision (%):</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fCommision" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fCommision : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Rider Cancellation Charges (Price In EUR) :</label>
                            <input type="text" class="form-control validate[required,custom[number]]" name="fCancellationFare" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->fCancellationFare : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Available Seats/Person capacity:</label>
                            <input type="number" class="form-control validate[required,custom[onlyNumberSp]]" name="iPersonSize" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iPersonSize : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Available Bags:</label>
                            <input type="text" class="form-control validate[required,custom[onlyNumberSp]]" name="iBagSize" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iBagSize : "";  ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Peak Time Surcharge On/Off:</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="ePickStatus" id="ePickStatus" onchange="showhidepickuptime();">
                                <label class="custom-control-label" for="ePickStatus"></label>
                            </div>
                        </div>
                    </div>
                    <?php echo view('admin/vehicleType/pickUpPeakSurcharge'); ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Peak Time Surcharge For Booking.com On/Off:</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" onchange="showhidepickuptimeBookingCom();" id="ePickStatusBookingCom" name="ePickStatusBookingCom">
                                <label class="custom-control-label" for="ePickStatusBookingCom"></label>
                            </div>
                        </div>
                    </div>
                    <?php echo view('admin/vehicleType/peakTimeBookingSite'); ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Night Charges On/Off:</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="eNightStatus" id="eNightStatus" onchange="showhidenighttime();">
                                <label class="custom-control-label" for="eNightStatus"></label>
                            </div>
                        </div>
                    </div>
                    <?php echo view('admin/vehicleType/pickUpNightCharges'); ?>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type Picture (Gray image):</label>
                            <input type="file" class="form-control validate[required]" name="vLogo" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vLogo : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type Picture (Orange image):</label>
                            <input type="file" class="form-control validate[required]" name="vLogo1" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vLogo1 : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Order:</label>
                            <select class="form-control select2 select2-hidden-accessible" name="iDisplayOrder">
                                <option>Select</option>
                                <option values="1">1</option>
                                <option values="2">2</option>
                                <option values="3">3</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.card-body -->
    </div>
</div>