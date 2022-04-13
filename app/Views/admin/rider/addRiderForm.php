<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/validation-engine/js/languages/jquery.validationEngine-en.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/validation-engine/js/jquery.validationEngine.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/app/rider.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $action == 'Update' ? 'Edit Rider' : 'Add Rider'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/rider'); ?>" class="btn btn-block btn-primary">BACK TO LISTING</a></li>
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
                    <form id="addForm" enctype="multipart/form-data">
                        <input type="hidden" name="ID" id="ID" value="<?php echo (!empty($details)) ?  $details->iUserId   : ''; ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="vName">First Name<span style="color:red;"> *</span></label>
                                <input type="text" name="vName" class="form-control col-md-6 validate[required]" id="vName" placeholder="First Name" value="<?php echo (!empty($details)) ?  $details->vName  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vLastName">Last Name<span style="color:red;"> *</span></label>
                                <input type="text" name="vLastName" class="form-control col-md-6 validate[required]" id="vLastName" placeholder="Last Name" value="<?php echo (!empty($details)) ?  $details->vLastName  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vEmail">Email<span style="color:red;"> *</span></label>
                                <input type="email" name="vEmail" class="form-control col-md-6 validate[required]" id="vEmail" placeholder="Email" value="<?php echo (!empty($details)) ?  $details->vEmail  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vPassword">Password <?php echo (!empty($details)) ? '[Leave blank to retain assigned password.]' : ''; ?></label>
                                <input type="password" name="vPassword" class="form-control col-md-6" id="vPassword" placeholder="Password">
                            </div>
                            <label>Gender</label><br />
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="eGender" value="Male" <?php echo (!empty($details) && ($details->eGender) == 'Male') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="eGender" value="Female" <?php echo (!empty($details) && ($details->eGender) == 'Female') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div><br />
                            <label></label>
                            <div class="form-group">
                                <label for="vImgName">Profile Picture</label>
                                <input type="file" name="vImgName" class="form-control col-md-6" id="vImgName" placeholder="Profile Picture" style="padding-bottom: 39px;">
                                <span class="fileError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vCountry">Country<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6 validate[required]" name="vCountry" id="vCountry">
                                    <option value="">Select</option>
                                    <?php foreach ($countries as $key => $val) { ?>
                                        <option value="<?php echo $val->vCountryCode; ?>" <?php echo (!empty($details) && ($details->vCountry == $val->vCountryCode)) ? 'selected' : ''; ?>><?php echo $val->vCountry; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="countryError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vPhone">Phone<span style="color:red;"> *</span></label>
                                <div class="input-group" style="width: 90%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="phoneCode"><?php echo (!empty($details)) ?  $details->vCode : ''; ?></span>
                                        <input type="hidden" id="vCode" name="vPhoneCode" readonly="" value="<?php echo (!empty($details)) ?  $details->vCode : ''; ?>">
                                    </div>
                                    <input type="text" class="form-control col-md-6 validate[required]" name="vPhone" id="vPhone" value="<?php echo (!empty($details)) ?  $details->vPhone : ''; ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="vLang">Language<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6 validate[required]" name="vLang" id="vLang">
                                    <option value="">Select</option>
                                    <?php foreach ($languages as $key => $val) { ?>
                                        <option value="<?php echo $val->vCode; ?>" <?php echo (!empty($details) && ($details->vLang == $val->vCode)) ? 'selected' : ''; ?>><?php echo $val->vTitle; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="langError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vCurrencyPassenger">Currency<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6 validate[required]" name="vCurrencyPassenger" id="vCurrencyPassenger">
                                    <option value="">Select</option>
                                    <?php foreach ($currencies as $key => $val) { ?>
                                        <option value="<?php echo $val->vName; ?>" <?php echo (!empty($details) && ($details->vCurrencyPassenger == $val->vName)) ? 'selected' : ''; ?>><?php echo $val->vName; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="currencyError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="eStatus">Status:</label>
                                <select class="form-control col-md-6 validate[required]" name="eStatus" id="eStatus">
                                    <option value="">Select Status</option>
                                    <option value="Active" <?php echo (!empty($details->eStatus) && $details->eStatus == 'Active') ? 'selected' : ''; ?>>Active</option>
                                    <option value="Inactive" <?php echo (!empty($details->eStatus) && ($details->eStatus == 'Inactive')) ? 'selected' : ''; ?>>In-Active</option>
                                </select>
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
                            <a href="<?php echo base_url('admin/driver'); ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- jquery-validation -->
<script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/country.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/state.js'); ?>"></script>