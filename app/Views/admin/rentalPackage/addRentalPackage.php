<script src="<?php echo base_url('assets/js/validation-engine/js/languages/jquery.validationEngine-en.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/validation-engine/js/jquery.validationEngine.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/app/rentalPackage.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Rental Package</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rental Package</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container">
                <?php
                $iVehicleTypeId = get('iVehicleTypeId');
                $iRentalPackageId = get('iRentalPackageId');
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $action; ?> Rental Package</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 200px;">
                                        <a href="<?php echo base_url('admin/rentalPackage/rentalPackagesList?iVehicleTypeId=' . $iVehicleTypeId) ?>" class="btn btn-sm btn-primary">Back to Rental Packages</a>&nbsp;
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <form id="addRentalPackage">
                                    <input type="hidden" name="iVehicleTypeId" value="<?php echo $iVehicleTypeId; ?>" />
                                    <input type="hidden" name="iRentalPackageId" value="<?php echo $iRentalPackageId; ?>" />
                                    <div class="form-group">
                                        <label>Package Name (français):</label>
                                        <input type="text" class="form-control validate[required]" name="vPackageName_FR" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->vPackageName_FR : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Package Name (English):</label>
                                        <input type="text" class="form-control validate[required]" name="vPackageName_EN" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->vPackageName_EN : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Package Name (Deutsche):</label>
                                        <input type="text" class="form-control validate[required]" name="vPackageName_DE" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->vPackageName_DE : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Package Name (Español):</label>
                                        <input type="text" class="form-control validate[required]" name="vPackageName_ES" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->vPackageName_ES : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Package Name (italiano):</label>
                                        <input type="text" class="form-control validate[required]" name="vPackageName_IT" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->vPackageName_IT : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Rental Total Price (In EUR):</label>
                                        <input type="text" class="form-control validate[required]" name="fPrice" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->fPrice : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Rental KiloMeter:</label>
                                        <input type="text" class="form-control validate[required]" name="fKiloMeter" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->fKiloMeter : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Rental Hour:</label>
                                        <input type="text" class="form-control validate[required]" name="fHour" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->fHour : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Additional Price Per KiloMeter (In EUR):</label>
                                        <input type="text" class="form-control validate[required]" name="fPricePerKM" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->fPricePerKM : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Additional Price Per Min (In EUR) :</label>
                                        <input type="text" class="form-control validate[required]" name="fPricePerHour" value="<?php echo (!empty($rentalPackagesDetails)) ? $rentalPackagesDetails->fPricePerHour : "";  ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $action; ?>
                                    </button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>