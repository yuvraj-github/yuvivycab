<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $action == 'Update' ? 'Edit Driver' : 'Add Driver'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/driver'); ?>" class="btn btn-block btn-primary">BACK TO LISTING</a></li>
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
                    <form id="addForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="ID" id="ID" value="<?php echo (!empty($details)) ?  $details->iDriverId   : ''; ?>">
                        <div class="card-body">
                            <?php if (!empty($details) && $details->vImage != '') {
                            ?>
                                <div class="form-group">
                                    <img src="<?php echo base_url(DRIVER_IMAGE_PATH . '/' . $details->vImage);
                                                ?>" alt="Edit Image" class="img-ipm">

                                </div>
                            <?php }
                            ?>
                            <div class="form-group">
                                <label for="vName">First Name<span style="color:red;"> *</span></label>
                                <input type="text" name="vName" class="form-control col-md-6" id="vName" placeholder="First Name" value="<?php echo (!empty($details)) ?  $details->vName  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vLastName">Last Name<span style="color:red;"> *</span></label>
                                <input type="text" name="vLastName" class="form-control col-md-6" id="vLastName" placeholder="Last Name" value="<?php echo (!empty($details)) ?  $details->vLastName  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vEmail">Email<span style="color:red;"> *</span></label>
                                <input type="email" name="vEmail" class="form-control col-md-6" id="vEmail" placeholder="Email" value="<?php echo (!empty($details)) ?  $details->vEmail  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vPassword">Password<span style="color:red;"> *</span>&nbsp;<?php echo (!empty($details)) ? '[Leave blank to retain assigned password.]' : ''; ?></label>
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
                                <label for="vImage">Profile Picture</label>
                                <input type="file" name="vImage" class="form-control col-md-6" id="vImage" placeholder="Profile Picture" style="padding-bottom: 39px;">
                                <span class="fileError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vCountry">Country<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="vCountry" id="vCountry">
                                    <option value="">Select</option>
                                    <?php foreach ($countries as $key => $val) { ?>
                                        <option value="<?php echo $val->vCountryCode; ?>" <?php echo (!empty($details) && ($details->vCountry == $val->vCountryCode)) ? 'selected' : ''; ?>><?php echo $val->vCountry; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="countryError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vState">State</label>
                                <select class="form-control select2 col-md-6" name="vState" id="vState">
                                    <?php if (!empty($details)) {
                                        foreach ($stateDetails as $key => $val) { ?>
                                            <option value="<?php echo $val->iStateId; ?>" <?php echo (!empty($details) && ($details->vState == $val->iStateId)) ? 'selected' : ''; ?>><?php echo $val->vState; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="">Select</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vCity">City</label>
                                <select class="form-control select2 col-md-6" name="vCity" id="vCity">
                                    <?php if (!empty($details)) {
                                        foreach ($cityDetails as $key => $val) { ?>
                                            <option value="<?php echo $val->iCityId; ?>" <?php echo (!empty($details) && ($details->vCity == $val->iCityId)) ? 'selected' : ''; ?>><?php echo $val->vCity; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="">Select</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vCaddress">Address</label>
                                <input type="text" name="vCaddress" class="form-control col-md-6" id="vCaddress" placeholder="Address" value="<?php echo (!empty($details)) ? $details->vCaddress  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vZip">Zip Code</label>
                                <input type="text" name="vZip" class="form-control col-md-6" id="vZip" placeholder="Zip Code" value="<?php echo (!empty($details)) ? $details->vZip : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vPhone">Phone<span style="color:red;"> *</span></label>
                                <div class="input-group" style="width: 90%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="phoneCode"><?php echo (!empty($details)) ?  $details->vCode : ''; ?></span>
                                        <input type="hidden" id="vCode" name="vCode" readonly="" value="<?php echo (!empty($details)) ?  $details->vCode : ''; ?>">
                                    </div>
                                    <input type="text" class="form-control col-md-6" name="vPhone" id="vPhone" value="<?php echo (!empty($details)) ?  $details->vPhone : ''; ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="iCompanyId">Company<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="iCompanyId" id="iCompanyId">
                                    <option value="">Select</option>
                                    <?php foreach ($companies as $key => $val) { ?>
                                        <option value="<?php echo $val->iCompanyId; ?>" <?php echo (!empty($details) && ($details->iCompanyId == $val->iCompanyId)) ? 'selected' : ''; ?>><?php echo $val->vCompany; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="companyError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vLang">Language<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="vLang" id="vLang">
                                    <option value="">Select</option>
                                    <?php foreach ($languages as $key => $val) { ?>
                                        <option value="<?php echo $val->vCode; ?>" <?php echo (!empty($details) && ($details->vLang == $val->vCode)) ? 'selected' : ''; ?>><?php echo $val->vTitle; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="langError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vCurrencyDriver">Currency<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="vCurrencyDriver" id="vCurrencyDriver">
                                    <option value="">Select</option>
                                    <?php foreach ($currencies as $key => $val) { ?>
                                        <option value="<?php echo $val->vName; ?>" <?php echo (!empty($details) && ($details->vCurrencyDriver == $val->vName)) ? 'selected' : ''; ?>><?php echo $val->vName; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="currencyError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vPaymentEmail">Payment Email</label>
                                <input type="email" name="vPaymentEmail" class="form-control col-md-6" id="vPaymentEmail" placeholder="Payment Email" value="<?php echo (!empty($details)) ? $details->vPaymentEmail  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vBankAccountHolderName">Account Holder Name</label>
                                <input type="text" name="vBankAccountHolderName" class="form-control col-md-6" id="vBankAccountHolderName" placeholder="Account Holder Name" value="<?php echo (!empty($details)) ? $details->vBankAccountHolderName  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vAccountNumber">Account Number</label>
                                <input type="text" name="vAccountNumber" class="form-control col-md-6" id="vAccountNumber" placeholder="Account Number" value="<?php echo (!empty($details)) ? $details->vAccountNumber  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vBankName">Bank Name</label>
                                <input type="text" name="vBankName" class="form-control col-md-6" id="vBankName" placeholder="Bank Name" value="<?php echo (!empty($details)) ? $details->vBankName  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vBankName">Bank Location</label>
                                <input type="text" name="vBankLocation" class="form-control col-md-6" id="vBankLocation" placeholder="Bank Location" value="<?php echo (!empty($details)) ? $details->vBankLocation  : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vBankName">BIC/SWIFT Code</label>
                                <input type="text" name="vBIC_SWIFT_Code" class="form-control col-md-6" id="vBIC_SWIFT_Code" placeholder="BIC/SWIFT Code" value="<?php echo (!empty($details)) ? $details->vBIC_SWIFT_Code  : ''; ?>">
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
<script src="<?php echo base_url('assets/js/app/driver/adddriver.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/country.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/state.js'); ?>"></script>