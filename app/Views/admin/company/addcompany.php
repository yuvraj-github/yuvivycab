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
                    <h1><?php echo $action == 'Update' ? 'Edit Company' : 'Add Company'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/company'); ?>" class="btn btn-block btn-primary">BACK TO LISTING</a></li>
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
                    <form id="companyForm" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="companyID" id="companyID" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->iCompanyId  : ''; ?>">
                        <div class="card-body">
                            <?php if (!empty($companyDetails) && $companyDetails->vImage != '') { ?>
                                <div class="form-group">
                                    <img src="<?php echo base_url(COMPANY_IMAGE_PATH . '/' . $companyDetails->vImage); ?>" alt="Edit Image" class="img-ipm">

                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <label for="vCompany">Company Name<span style="color:red;"> *</span></label>
                                <input type="text" name="vCompany" class="form-control col-md-6" id="vCompany" placeholder="Company Name" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vCompany : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vEmail">Email<span style="color:red;"> *</span></label>
                                <input type="email" name="vEmail" class="form-control col-md-6" id="vEmail" placeholder="Email" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vEmail : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vPassword">Password<span style="color:red;"> *</span>&nbsp;<?php echo (!empty($companyDetails)) ? '[Leave blank to retain assigned password.]' : ''; ?></label>
                                <input type="password" name="vPassword" class="form-control col-md-6" id="vPassword" placeholder="Password">
                            </div>
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
                                        <option value="<?php echo $val->vCountryCode; ?>" <?php echo (!empty($companyDetails) && ($companyDetails->vCountry == $val->vCountryCode)) ? 'selected' : ''; ?>><?php echo $val->vCountry; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="countryError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vState">State</label>
                                <select class="form-control select2 col-md-6" name="vState" id="vState">
                                    <?php if (!empty($companyDetails)) {
                                        foreach ($stateDetails as $key => $val) { ?>
                                            <option value="<?php echo $val->iStateId; ?>" <?php echo (!empty($stateDetails) && ($val->iStateId == $companyDetails->vState)) ? 'selected' : ''; ?>><?php echo $val->vState; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="">Select</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vCity">City</label>
                                <select class="form-control select2 col-md-6" name="vCity" id="vCity">
                                    <?php if (!empty($companyDetails)) {
                                        foreach ($cityDetails as $key => $val) { ?>
                                            <option value="<?php echo $val->iCityId; ?>" <?php echo (!empty($cityDetails) && ($val->iCityId == $companyDetails->vCity)) ? 'selected' : ''; ?>><?php echo $val->vCity; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option value="">Select</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vCaddress">Address<span style="color:red;"> *</span></label>
                                <input type="text" name="vCaddress" class="form-control col-md-6" id="vCaddress" placeholder="Address" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vCaddress : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vZip">Zip Code<span style="color:red;"> *</span></label>
                                <input type="text" name="vZip" class="form-control col-md-6" id="vZip" placeholder="Zip Code" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vZip : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vPhone">Phone<span style="color:red;"> *</span></label>
                                <div class="input-group" style="width: 90%;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="phoneCode"><?php echo (!empty($companyDetails)) ?  $companyDetails->vCode : ''; ?></span>
                                        <input type="hidden" id="vCode" name="vCode" readonly="" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vCode : ''; ?>">
                                    </div>
                                    <input type="text" class="form-control col-md-6" name="vPhone" id="vPhone" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vPhone : ''; ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="vLang">Language<span style="color:red;"> *</span></label>
                                <select class="form-control select2 col-md-6" name="vLang" id="vLang">
                                    <option value="">Select</option>
                                    <?php foreach ($languages as $key => $val) { ?>
                                        <option value="<?php echo $val->vCode; ?>" <?php echo (!empty($companyDetails) && ($companyDetails->vLang == $val->vCode)) ? 'selected' : ''; ?>><?php echo $val->vTitle; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="langError" style="color:red;"></span>
                            </div>
                            <div class="form-group">
                                <label for="vVatNum">VAT Number</label>
                                <input type="text" name="vVatNum" class="form-control col-md-6" id="vVatNum" placeholder="VAT Number" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vVat : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="vCommission">Commission (%)</label>
                                <input type="text" name="vCommission" class="form-control col-md-6" id="vCommission" placeholder="vCommission" value="<?php echo (!empty($companyDetails)) ?  $companyDetails->vCommission : ''; ?>">
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
                            <a href="<?php echo base_url('admin/company'); ?>" class="btn btn-default">Cancel</a>
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
<script src="<?php echo base_url('assets/js/app/company/addcompany.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/country.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/state.js'); ?>"></script>