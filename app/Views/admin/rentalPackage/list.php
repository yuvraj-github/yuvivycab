<!-- <script src="<?php echo base_url('assets/js/app/rentalVehicle.js'); ?>"></script> -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Rental Vehicle</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Rental Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Rental Vehicles List</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <!-- <a href="groups/showAddGroupsForm" class="btn btn-sm btn-primary">Add New Group</a> -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-sm table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <?php $q = make_query(); ?>
                                            <th>#</th>
                                            <th>
                                                <span>Vehicle Type</span> <?php $nsor = check_sort('group_name', $q); ?>
                                                <a href="<?php echo base_url('admin/groups') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Rental Package Count</span> <?php $nsor = check_sort('status', $q); ?>
                                                <a href="<?php echo base_url('admin/groups') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($vehicleTypes)) {
                                            $count = 0;
                                            foreach ($vehicleTypes as $type) { ?>
                                                <tr>
                                                    <td><?php echo ++$count; ?></td>
                                                    <td><?php echo $type->vVehicleType; ?></td>
                                                    <td class="center-align"><?php echo $type->vehicleTypeCount; ?></td>
                                                    <td>
                                                        <a href="rentalPackage/rentalPackagesList?iVehicleTypeId=<?php echo $type->iVehicleTypeId; ?>" class="btn btn-sm btn-primary">
                                                            Add New Packages
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
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