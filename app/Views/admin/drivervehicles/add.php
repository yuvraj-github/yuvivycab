<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<?php
$start = date('Y');
$end = '1970';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $action == 'Update' ? 'Edit Taxi' : 'Add Taxi'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/driverVehicles'); ?>" class="btn btn-block btn-primary">BACK TO LISTING</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php showMessage(); ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <!-- form start -->
                    <form id="addForm" method="POST">
                        <input type="hidden" name="ID" id="ID" value="<?php echo (!empty($details)) ?  $details->iDriverVehicleId   : ''; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="iMakeId">Make<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="iMakeId" id="iMakeId">
                                    <option value="">CHOOSE MAKE</option>
                                    <?php foreach ($makes as $key => $val) { ?>
                                        <option value="<?php echo $val->iMakeId; ?>" <?php echo (!empty($details) && ($details->iMakeId == $val->iMakeId)) ? 'selected' : ''; ?>><?php echo $val->vMake; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="makeError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="iModelId">Model<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="iModelId" id="iModelId">
                                    <?php if (!empty($details)) {
                                        foreach ($modelDetails as $key => $val) { ?>
                                            <option value="<?php echo $val->iModelId; ?>" <?php echo (!empty($details) && ($details->iModelId == $val->iModelId)) ? 'selected' : ''; ?>><?php echo $val->vTitle; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="">CHOOSE MODEL</option>
                                    <?php } ?>
                                </select>
                                <span class="modelError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="iYear">Year<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="iYear" id="iYear">
                                    <option value="">CHOOSE YEAR</option>
                                    <?php for ($j = $start; $j >= $end; $j--) { ?>
                                        <option value="<?= $j ?>" <?php echo (!empty($details) && ($details->iYear == $j)) ? 'selected' : ''; ?>><?= $j ?></option>
                                    <?php } ?>
                                </select>
                                <span class="yearError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vLicencePlate">License Plate<span style="color:red;"> *</span></label>
                                <input type="text" name="vLicencePlate" class="form-control col-md-6" id="vLicencePlate" placeholder="Licence Plate" value="<?php echo (!empty($details)) ? $details->vLicencePlate  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="iCompanyId">Company<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="iCompanyId" id="iCompanyId">
                                    <option value="">CHOOSE COMPANY</option>
                                    <?php foreach ($companies as $key => $val) { ?>
                                        <option value="<?php echo $val->iCompanyId; ?>" <?php echo (!empty($details) && ($details->iCompanyId == $val->iCompanyId)) ? 'selected' : ''; ?>><?php echo $val->vCompany; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="companyError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="iDriverId">Driver<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="iDriverId" id="iDriverId">
                                    <?php if (!empty($details)) {
                                        foreach ($driverDetails as $key => $val) { ?>
                                            <option value="<?php echo $val->iDriverId ; ?>" <?php echo (!empty($details) && ($details->iDriverId  == $val->iDriverId)) ? 'selected' : ''; ?>><?php echo $val->driverName.' ('.$val->vEmail.')'; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="">CHOOSE DRIVER</option>
                                    <?php } ?>
                                </select>
                                <span class="driverError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vColour">Vehicle Color</label>
                                <input type="text" name="vColour" class="form-control col-md-6" id="vColour" placeholder="Vehicle Color" value="<?php echo (!empty($details)) ? $details->vColour  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="eChildSeatAvailable">Child Seat available?</label><br />
                                <input type="checkbox" id="eChildSeatAvailable" name="eChildSeatAvailable"  data-bootstrap-switch data-on-text="YES" data-off-text="NO" <?php echo (!empty($details) && ($details->eChildSeatAvailable=='Yes')) ? 'checked' : ''; ?>>
                            </div>
                            <label for="vColour">Taxi Type</label><br />
                            <?php 
                                $carType = !empty($details) ? explode(',', $details->vCarType) : [];
                                $RentalCarType = !empty($details) ? explode(',', $details->vRentalCarType) : [];
                                foreach ($vehiclesType as $key => $val) { ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div><?php echo $val->vVehicleType . ' (' . $val->eType . ')' ?></div>
                                        <div>( Location : <?php echo $val->vLocationName; ?>)</div>
                                        <?php if ($val->totalrental > 0) { ?>
                                            <div style="display:<?php echo in_array($val->iVehicleTypeId, $carType) ? '' : 'none'; ?>;" class="rentalClass">
                                                <input type="checkbox" class="chk" name="vRentalCarType[]" value="<?php echo $val->iVehicleTypeId; ?>" <?php echo in_array($val->iVehicleTypeId, $RentalCarType) ? 'checked' : ''; ?>> Accept rental request for <?php echo $val->vVehicleType; ?> vehicle type?
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="checkbox" class="vCarType" name="vCarType[]" data-bootstrap-switch value="<?php echo $val->iVehicleTypeId; ?>" <?php echo in_array($val->iVehicleTypeId, $carType) ? 'checked' : ''; ?>>
                                    </div>
                                </div><br />
                            <?php } ?>
                            <div class="form-group">
                                <label for="eStatus">Status</label><br />
                                <input type="checkbox" id="eStatus" name="eStatus" checked data-bootstrap-switch>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <?php echo $action; ?>
                            </button>
                            <button type="reset" class="btn btn-default">
                                Reset
                            </button>
                            <a href="<?php echo base_url('admin/driverVehicles'); ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- jquery-validation -->
<script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/drivervehicles/add.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/make.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/company.js'); ?>"></script>