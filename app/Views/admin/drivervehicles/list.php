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
                    <h1>Drivers Vehicles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/driverVehicles/add'); ?>" class="btn btn-block btn-primary">ADD VEHICLES</a></li>
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
                                        <option value="m.vMake" <?php echo $criteria->option == 'm.vMake' ? 'selected' : ''; ?>>Vehicle</option>
                                        <option value="c.vCompany" <?php echo $criteria->option == 'c.vCompany' ? 'selected' : ''; ?>>Company</option>
                                        <option value="DriverName" <?php echo $criteria->option == 'DriverName' ? 'selected' : ''; ?>>Driver</option>
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
                            <div class="col-4">
                                <div class="form-group">
                                    <input type="submit" value="Search" class="btn btn-primary" title="Search">
                                    <a href="<?php echo base_url('admin/driverVehicles'); ?>" class="btn btn-default">Reset</a>
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
                                            <span>Taxis</span><?php $nsor = check_sort('vMake', $q); ?>
                                            <a href="<?php echo base_url('admin/driverVehicles') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <span>Company</span><?php $nsor = check_sort('vCompany ', $q); ?>
                                            <a href="<?php echo base_url('admin/driverVehicles') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>
                                            <span>Driver</span><?php $nsor = check_sort('DriverName', $q); ?>
                                            <a href="<?php echo base_url('admin/driverVehicles') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>View/Edit Documents</th>
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
                                                <a href="<?php echo "driverVehicles/edit?ID=" . base64_encode($val->iDriverVehicleId); ?>" style="text-decoration: underline;"><?php echo $val->vMake . ' ' . $val->modelName; ?></a>
                                            </td>
                                            <td><?php echo $val->vCompany; ?></td>
                                            <td><?php echo $val->DriverName; ?></td>
                                            <td align="center">
                                                <a href="#" target="_blank">
                                                    <img src="<?php echo base_url('assets/img/edit-doc.png'); ?>" alt="Edit Document">
                                                </a>
                                            </td>
                                            <td align="center" style="text-align:center;">
                                                <?php
                                                $status = (strtolower($val->eStatus) == 'active') ? 'Active' : 'Inactive';
                                                $statusIcon = (strtolower($val->eStatus) == 'active') ? 'active-icon.png' : 'inactive-icon.png';
                                                ?>
                                                <a href="javascript:void(0)" data-status="<?php echo $status == 'Active' ? 'Inactive' : 'Active'; ?>" data-id="<?php echo $val->iDriverVehicleId; ?>" id="actionStatus">
                                                    <img src="<?php echo base_url('assets/img/' . $statusIcon); ?>" alt="image" data-toggle="tooltip" title="" data-original-title="<?php echo $status; ?>">
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="<?php echo "driverVehicles/edit?ID=" . base64_encode($val->iDriverVehicleId); ?>">Edit</a>
                                                <a class="btn btn-sm btn-danger deleteRecord" href="javascript:void()" data-id="<?php echo $val->iDriverVehicleId; ?>">Delete</a>
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
<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets/js/app/drivervehicles/list.js'); ?>"></script>