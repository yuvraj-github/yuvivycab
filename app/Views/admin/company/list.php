<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<div class="content-wrapper">
    <?php showMessage(); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Company</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('admin/company/add'); ?>" class="btn btn-block btn-primary">ADD COMPANY</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <hr>
    <section class="content">
        <div class="container-fluid">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <span><b>Search:</b></span>&nbsp;
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="select2" style="width: 100%;" name="option" id="option">
                                        <option value="">All</option>
                                        <option value="vCompany" <?php echo $criteria->option == 'vCompany' ? 'selected' : ''; ?>>Name</option>
                                        <option value="vEmail" <?php echo $criteria->option == 'vEmail' ? 'selected' : ''; ?>>Email</option>
                                        <option value="MobileNumber" <?php echo $criteria->option == 'MobileNumber' ? 'selected' : ''; ?>>Mobile</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <input type="Text" id="keyword" name="keyword" value="<?php echo $criteria->keyword; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="select2" style="width: 100%;" name="eStatus" id="estatus_value">
                                        <option value="">Select Status</option>
                                        <option value="Active" <?php echo $criteria->eStatus == 'Active' ? 'selected' : ''; ?>>Active</option>
                                        <option value="Inactive" <?php echo $criteria->eStatus == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="select2" style="width: 100%;" name="vCountry" id="vCountry">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $key => $val) { ?>
                                            <option value="<?php echo $val->vCountryCode; ?>" <?php echo ($criteria->vCountry == $val->vCountryCode) ? 'selected' : ''; ?>><?php echo $val->vCountry; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="select2" style="width: 100%;" name="vState" id="vState">
                                        <?php if (!empty($states)) {
                                            foreach ($states as $key => $val) { ?>
                                                <option value="<?php echo $val->iStateId; ?>" <?php echo ($val->iStateId == $criteria->vState) ? 'selected' : ''; ?>><?php echo $val->vState; ?></option>
                                            <?php }
                                        } else { ?>
                                            <option value="">Select State</option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 50px;">
                            <div class="col-2">
                                <div class="form-group">
                                    <select class="select2" style="width: 100%;" name="vCity" id="vCity">
                                        <?php if (!empty($cities)) {
                                            foreach ($cities as $key => $val) { ?>
                                                <option value="<?php echo $val->iCityId; ?>" <?php echo ($val->iCityId == $criteria->vCity) ? 'selected' : ''; ?>><?php echo $val->vCity; ?></option>
                                            <?php }
                                        } else { ?>
                                            <option value="">Select City</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <input type="submit" value="Search" class="btn btn-primary" title="Search">
                                    <a href="<?php echo base_url('admin/company'); ?>" class="btn btn-default">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered text-nowrap">
                                <thead>
                                    <?php $q = make_query(); ?>
                                    <tr>
                                        <th>
                                            <span>Company Name</span><?php $nsor = check_sort('vCompany', $q); ?>
                                            <a href="<?php echo base_url('admin/company') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <!-- <th>Drivers</th> -->
                                        <th>
                                            <span>Email</span><?php $nsor = check_sort('vEmail', $q); ?>
                                            <a href="<?php echo base_url('admin/company') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>Mobile</th>
                                        <th>View/Edit Documents</th>
                                        <th>
                                            <span>Status</span><?php $nsor = check_sort('eStatus', $q); ?>
                                            <a href="<?php echo base_url('admin/company') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($companies as $key => $val) {
                                        $val = (object)$val;
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo "company/edit?companyID=" . base64_encode($val->iCompanyId); ?>" style="text-decoration: underline;"><?php echo $val->vCompany; ?></a>
                                            </td>
                                            <!-- <td align="center">
                                                <a href="#" target="_blank">1</a>
                                            </td> -->
                                            <td><?php echo $val->vEmail; ?></td>
                                            <td><?php echo '(+' . $val->vCode . ') ' . $val->vPhone; ?></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('admin/company/document?companyID='.base64_encode($val->iCompanyId)); ?>" target="_blank">
                                                    <img src="<?php echo base_url('assets/img/edit-doc.png'); ?>" alt="Edit Document">
                                                </a>
                                            </td>
                                            <td align="center" style="text-align:center;">
                                                <?php
                                                $status = ($val->eStatus == 'Active') ? 'Active' : 'Inactive';
                                                $statusIcon = ($val->eStatus == 'Active') ? 'active-icon.png' : 'inactive-icon.png';
                                                ?>
                                                <a href="javascript:void(0)" data-status="<?php echo $status == 'Active' ? 'Inactive' : 'Active'; ?>" data-companyid="<?php echo $val->iCompanyId; ?>" id="actionStatus"><img src="<?php echo base_url('assets/img/' . $statusIcon); ?>" alt="image" data-toggle="tooltip" title="" data-original-title="<?php echo $status; ?>"></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?php echo "company/edit?companyID=" . base64_encode($val->iCompanyId); ?>">Edit</a>
                                                <a class="btn btn-sm btn-danger deleteCompany" href="javascript:void()" data-companyid="<?php echo $val->iCompanyId; ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div style="margin-top: 10px;">
                            <?php if ($pager) {
                                //$pagi_path='admin/company';
                                // $pager->setPath($pagi_path);
                                echo $pager->links('default', 'full_pagination');
                            } ?>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script src="<?php echo base_url('assets/js/app/company/listcompany.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/country.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/state.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>