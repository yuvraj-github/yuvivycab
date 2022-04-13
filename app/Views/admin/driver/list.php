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
                    <h1>Drivers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/driver/add'); ?>" class="btn btn-block btn-primary">ADD DRIVER</a></li>
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
                                        <option value="DriverName" <?php echo $criteria->option == 'DriverName' ? 'selected' : ''; ?>>Driver Name</option>
                                        <option value="c.vCompany" <?php echo $criteria->option == 'c.vCompany' ? 'selected' : ''; ?>>Company Name</option>
                                        <option value="rd.vEmail" <?php echo $criteria->option == 'rd.vEmail' ? 'selected' : ''; ?>>Email</option>
                                        <option value="MobileNumber" <?php echo $criteria->option == 'MobileNumber' ? 'selected' : ''; ?>>Mobile</option>
                                        <option value="Male" <?php echo $criteria->option == 'Male' ? 'selected' : ''; ?>>Gentlemen</option>
                                        <option value="Female" <?php echo $criteria->option == 'Female' ? 'selected' : ''; ?>>Ladies</option>
                                        <option value="EmptyGender" <?php echo $criteria->option == 'EmptyGender' ? 'selected' : ''; ?>>No Gender</option>

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
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="submit" value="Search" class="btn btn-primary" title="Search">
                                    <a href="<?php echo base_url('admin/driver'); ?>" class="btn btn-default">Reset</a>
                                    <a href="javascript:void(0);" class="btn btn-default btnExport">Export</a>
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
                                            <span>Driver Name</span><?php $nsor = check_sort('driverName', $q); ?>
                                            <a href="<?php echo base_url('admin/driver') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <span>Company Name</span><?php $nsor = check_sort('vCompany ', $q); ?>
                                            <a href="<?php echo base_url('admin/driver') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <span>Email</span><?php $nsor = check_sort('vEmail', $q); ?>
                                            <a href="<?php echo base_url('admin/driver') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <span>Signup Date</span><?php $nsor = check_sort('tRegistrationDate', $q); ?>
                                            <a href="<?php echo base_url('admin/driver') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>Mobile</th>
                                        <th>Wallet Balance</th>
                                        <th>View/Edit Documents</th>
                                        <th>Mark Favourite</th>
                                        <th>
                                            <span>Status</span><?php $nsor = check_sort('eStatus', $q); ?>
                                            <a href="<?php echo base_url('admin/driver') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getAll as $key => $val) {
                                        $val = (object)$val;
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo "driver/edit?ID=" . base64_encode($val->iDriverId); ?>" style="text-decoration: underline;"><?php echo $val->vName . ' ' . $val->vLastName; ?></a>
                                            </td>
                                            <td><?php echo $val->vCompany; ?></td>
                                            <td><?php echo $val->vEmail; ?></td>
                                            <td><?php echo date('jS F,Y', strtotime($val->tRegistrationDate)); ?></td>
                                            <td><?php echo '(+' . $val->vCode . ') ' . $val->vPhone; ?></td>
                                            <td>
                                                € <?php echo ($val->iBalance == '') ? '0.00' : $val->iBalance; ?><br />
                                                <a href="javascript:void(0)" class="btn btn-success btn-xs addBalance" data-userid="<?php echo $val->iDriverId; ?>" data-iUserWalletId="<?php echo $val->iUserWalletId; ?>">Add Balance</a>
                                            </td>
                                            <td align="center">
                                                <a href="<?php echo base_url('admin/driver/document?ID=' . base64_encode($val->iDriverId)); ?>" target="_blank">
                                                    <img src="<?php echo base_url('assets/img/edit-doc.png'); ?>" alt="Edit Document">
                                                </a>
                                            </td>
                                            <td align="center">
                                                <input type="checkbox" class="isFavurite" name="isFavurite" <?php echo $val->isFavurite == 'No' ? '' : 'checked';?> data-bootstrap-switch data-on-text="YES" data-off-text="NO" data-idriverid="<?php echo $val->iDriverId?>">
                                            </td>
                                            <td align="center" style="text-align:center;">
                                                <?php
                                                $status = (strtolower($val->eStatus) == 'active') ? 'Active' : 'Inactive';
                                                $statusIcon = (strtolower($val->eStatus) == 'active') ? 'active-icon.png' : 'inactive-icon.png';
                                                ?>
                                                <a href="javascript:void(0)" data-status="<?php echo $status == 'Active' ? 'Inactive' : 'Active'; ?>" data-id="<?php echo $val->iDriverId; ?>" id="actionStatus"><img src="<?php echo base_url('assets/img/' . $statusIcon); ?>" alt="image" data-toggle="tooltip" title="" data-original-title="<?php echo $status; ?>"></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?php echo "driver/edit?ID=" . base64_encode($val->iDriverId); ?>">Edit</a>
                                                <a class="btn btn-sm btn-danger deleteRecord" href="javascript:void()" data-id="<?php echo $val->iDriverId; ?>">Delete</a>
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
    <!-- /.content -->
    <div class="modal fade" id="walletModal">
        <div class="modal-dialog">
            <div id="modalContent">

            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/driver/listdriver.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/country.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/state.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/walletbalance.js'); ?>"></script>