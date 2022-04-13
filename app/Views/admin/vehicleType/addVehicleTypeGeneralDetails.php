<div class="card card-primary">
    <div class="card-header">
        <h4 class="card-title w-100">
            <a class="d-block w-100" data-toggle="collapse-no" href="#generalDetails" aria-expanded="true">
                General Details
            </a>
            <!-- <a class="pull-right" href="<?php echo base_url('admin/rentalPackage/rentalPackagesList?iVehicleTypeId=' . $iVehicleTypeId) ?>">Back to Rental Packages</a> -->
        </h4>
    </div>
    <!-- /.card-header -->
    <div id="generalDetails" class="collapse-no show" data-parent="#accordion">
        <div class="card-body table-responsive">
            <section class="primary">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Vehicle Category / Map Icon Type:</label>
                            <select class="form-control select2 select2-hidden-accessible" name="eIconType" id="eIconType" tabindex="-1" aria-hidden="true">
                                <option id="Car" value="Car">Car</option>
                                <option id="MotoBike" value="Bike">Moto-Bike</option>
                                <option id="Cycle" value="Cycle">Cycle</option>
                                <option id="Truck" value="Truck">Truck</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Vehicle Type:</label>
                            <input type="text" class="form-control validate[required]" name="vVehicleType" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vVehicleType : "";  ?>">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Vehicle type for Booking.com[What is it?]:</label>
                            <select class="form-control select2 select2-hidden-accessible" name="vVehicleType_booking" id="vVehicleType_booking" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                <option value="STANDARD">Standard</option>
                                <option value="EXECUTIVE">Executive</option>
                                <option value="EXECUTIVEPEOPLECARRIER">Executive People Carrier</option>
                                <option value="LUXURY">Luxury</option>
                                <option value="PEOPLECARRIER">People Carrier</option>
                                <option value="LARGEPEOPLECARRIER">Large People Carrier</option>
                                <option value="MINIBUS">Minibus</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type (français):</label>
                            <input type="text" class="form-control validate[required]" name="vVehicleType_FR" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vVehicleType_FR : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type Name For Rental (français):</label>
                            <input type="text" class="form-control validate[required]" name="vRentalAlias_FR" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vRentalAlias_FR : "";  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Package Name (English):</label>
                            <input type="text" class="form-control validate[required]" name="vVehicleType_EN" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vVehicleType_EN : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type Name For Rental (English):</label>
                            <input type="text" class="form-control validate[required]" name="vRentalAlias_EN" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vRentalAlias_EN : "";  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type (Deutsche):</label>
                            <input type="text" class="form-control validate[required]" name="vVehicleType_DE" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vVehicleType_DE : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type Name For Rental (Deutsche):</label>
                            <input type="text" class="form-control validate[required]" name="vRentalAlias_DE" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vRentalAlias_DE : "";  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type (Español):</label>
                            <input type="text" class="form-control validate[required]" name="vVehicleType_ES" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vVehicleType_ES : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type Name For Rental (Español):</label>
                            <input type="text" class="form-control validate[required]" name="vRentalAlias_ES" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vRentalAlias_ES : "";  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type (italiano):</label>
                            <input type="text" class="form-control validate[required]" name="vVehicleType_IT" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vVehicleType_IT : "";  ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Vehicle Type Name For Rental (italiano):</label>
                            <input type="text" class="form-control validate[required]" name="vRentalAlias_IT" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->vRentalAlias_IT : "";  ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Location</label>
                            <select class="form-control select2 select2-hidden-accessible" name="iLocationId" id="iLocationId" tabindex="-1" aria-hidden="true">
                                <option value="">Select Location</option>
                                <?php
                                if (isset($locations) && !empty($locations)) {
                                    foreach ($locations as $location) { ?>
                                        <option value="<?php echo $location->iLocationId ?>">
                                            <?php echo $location->vLocationName ?>
                                        </option>
                                <?php }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- /.card-body -->
</div>