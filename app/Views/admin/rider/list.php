<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/app/rider.js'); ?>"></script>
<div class="content-wrapper">
    <?php showMessage(); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/rider/showAddRiderForm'); ?>" class="btn btn-block btn-primary">Add Rider</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <hr>
    <section class="content">
        <div class="container-fluid">

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
                                            <span>Rider Name</span><?php $nsor = check_sort('name', $q); ?>
                                            <a href="<?php echo base_url('admin/rider') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Wallet Balance</th>
                                        <th>
                                            <span>Status</span><?php $nsor = check_sort('eStatus', $q); ?>
                                            <a href="<?php echo base_url('admin/rider') . $nsor->link; ?>">
                                                <i class="fa <?php echo $nsor->class; ?>"></i>
                                            </a>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($registeredUserslist) && !empty($registeredUserslist)) {
                                        foreach ($registeredUserslist as $data) { ?>
                                            <tr>
                                                <td><?php echo $data->name; ?></td>
                                                <td><?php echo $data->vEmail; ?></td>
                                                <td><?php echo $data->mobile; ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary">Add Balance</button>
                                                </td>
                                                <td><?php echo $data->eStatus; ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/rider/showAddRiderForm?ID='.$data->iUserId); ?>" class="btn btn-block btn-primary">Add Rider</a>
                                                    <a class="btn btn-sm btn-danger deleteRider" data-attr="<?php echo $data->iUserId; ?>">Delete</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="6">No data found!</td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div style="margin-top: 10px;">
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
</div>
<!-- Bootstrap Switch -->