<script src="<?php echo base_url('assets/js/app/rentalPackage.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Rental Package List</h1>
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
                                <h3 class="card-title">Rental Package List</h3>
                                <?php $iVehicleTypeId = get('iVehicleTypeId'); ?>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 300px;">
                                        <a href="<?php echo base_url('admin/rentalPackage')?>" class="btn btn-sm btn-primary">Back to Vehicle Tyes</a>&nbsp;
                                        <a href="addRentalPackagesForm?iVehicleTypeId=<?php echo $iVehicleTypeId; ?>" class="btn btn-sm btn-primary">Add New Package</a>
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
                                                <span>Package Name</span> <?php $nsor = check_sort('package_name', $q); ?>
                                                <a href="<?php echo base_url('admin/rentalPackage/rentalPackagesList') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Rental Total Price <br>(In EUR)</span> <?php $nsor = check_sort('status', $q); ?>
                                                <a href="<?php echo base_url('admin/rentalPackage/rentalPackagesList') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Rental <br>KiloMeter</span> <?php $nsor = check_sort('status', $q); ?>
                                                <a href="<?php echo base_url('admin/rentalPackage/rentalPackagesList') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Rental <br>Hour</span> <?php $nsor = check_sort('status', $q); ?>
                                                <a href="<?php echo base_url('admin/rentalPackage/rentalPackagesList') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Additional <br>Price/KiloMeter</span> <?php $nsor = check_sort('status', $q); ?>
                                                <a href="<?php echo base_url('admin/rentalPackage/rentalPackagesList') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Additional Price/Min <br> (In EUR) </span> <?php $nsor = check_sort('status', $q); ?>
                                                <a href="<?php echo base_url('admin/rentalPackage/rentalPackagesList') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($rentalPackages)) {
                                            $count = 0;
                                            foreach ($rentalPackages as $package) { ?>
                                                <tr>
                                                    <td><?php echo ++$count; ?></td>
                                                    <td><?php echo $package->vPackageName_FR; ?></td>
                                                    <td class="center-align"><?php echo $package->fPrice; ?></td>
                                                    <td class="center-align"><?php echo $package->fKiloMeter; ?></td>
                                                    <td class="center-align"><?php echo $package->fHour; ?></td>
                                                    <td class="center-align"><?php echo $package->fPricePerKM; ?></td>
                                                    <td class="center-align"><?php echo $package->fPricePerHour; ?></td>
                                                    <td>
                                                        <a href="addRentalPackagesForm?iVehicleTypeId=<?php echo $iVehicleTypeId; ?>&iRentalPackageId=<?php echo $package->iRentalPackageId; ?>" class="btn btn-sm btn-primary">
                                                            Edit
                                                        </a>
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-danger deleteRentalPackage" data-attr="<?php echo $package->iRentalPackageId; ?>">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else { ?>
                                            <tr>
                                                <td colspan=6>No data found</td>
                                            </tr>
                                        <?php
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