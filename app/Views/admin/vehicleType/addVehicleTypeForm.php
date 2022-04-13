<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap-clockpicker.min.css'); ?>">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css');?>">
<script src="<?php echo base_url('assets/js/validation-engine/js/languages/jquery.validationEngine-en.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/validation-engine/js/jquery.validationEngine.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/moment.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/bootstrap-clockpicker.min.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/app/vehicleType.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Vehicle Type</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Vehicle Type</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form id="addVehicleType">
                            <div id="accordion">
                                <input type="hidden" name="iVehicleTypeId" value="<?php echo (!empty($vehicleTypeDetails)) ? $vehicleTypeDetails->iVehicleTypeId: ""; ?>" />
                                <input type="hidden" name="eType" value="Ride">
                                <?php
                                echo view('admin/vehicleType/addVehicleTypeGeneralDetails',array('vehicleTypeDetails' => $vehicleTypeDetails));
                                echo view('admin/vehicleType/addPriceAndWaiting',array('vehicleTypeDetails' => $vehicleTypeDetails));
                                echo view('admin/vehicleType/addBookingSitePrices',array('vehicleTypeDetails' => $vehicleTypeDetails));
                                echo view('admin/vehicleType/addOtherDetails',array('vehicleTypeDetails' => $vehicleTypeDetails));
                                ?>
                            </div>
                            <button class="btn btn-sm btn-primary">Add</button>
                            <button class="btn btn-sm btn-default" type="reset">Reset</button>
                            <button class="btn btn-sm btn-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>