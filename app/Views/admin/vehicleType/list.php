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
                <form name="frmsearch" method="get">
                    <label for="textfield"><strong>Search:</strong></label>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <?php 
                                $getOption = get('option');
                                ?>
                                <select name="option" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                    <option value="">All</option>
                                    <option value="vt.vVehicleType_FR" <?php echo ($getOption == 'vt.vVehicleType_FR') ? 'selected' : ""; ?>>Type</option>
                                    <option value="vt.fPricePerKM"     <?php echo ($getOption == 'vt.fPricePerKM') ? 'selected' : ""; ?>>Price Per KMs</option>
                                    <option value="vt.fPricePerMin"    <?php echo ($getOption == 'vt.fPricePerMin') ? 'selected' : ""; ?>>Price Per Min</option>
                                    <option value="vt.iPersonSize"     <?php echo ($getOption == 'vt.iPersonSize') ? 'selected' : ""; ?>>Person Capacity</option>
                                    <option value="vt.iBagSize"        <?php echo ($getOption == 'vt.iBagSize') ? 'selected' : ""; ?>>Bag Capacity</option>
                                    <option value="vt.iLocationid"     <?php echo ($getOption == 'vt.iLocationid') ? 'selected' : ""; ?>>Location</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="Text" id="keyword" name="keyword" value="<?php echo get('keyword'); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <select class="select2 form-control" name="vLocationName" id="vCountry">
                                    <option value="">Select Location</option>
                                    <?php foreach ($locations as $key => $val) { ?>
                                        <option value="<?php echo $val->vLocationName; ?>" <?php echo ($criteria->vLocationName == $val->vLocationName) ? 'selected' : ''; ?>><?php echo $val->vLocationName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="submit" value="Search" class="btnalt button11" id="Search" name="Search" title="Search">
                                    <input type="button" value="Reset" class="btnalt button11" onclick="window.location.href='vehicleType'">
                                </div>
                            </div>
                        </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Vehicles List</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="vehicleType/showAddVehicleTypeForm" class="btn btn-sm btn-primary">Add New Vehicle Type</a>
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
                                                <span>Type</span> <?php $nsor = check_sort('vVehicleType', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Localization</span> <?php $nsor = check_sort('vLocationName', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Price<br>Per KM</span> <?php $nsor = check_sort('fPricePerKM', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Price<br>Per Min</span> <?php $nsor = check_sort('fPricePerMin', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Base Fare</span> <?php $nsor = check_sort('iBaseFare', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Commission<br>%</span> <?php $nsor = check_sort('fCommision', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Person<br>Capacity</span> <?php $nsor = check_sort('iPersonSize', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Bag<br>Capacity</span> <?php $nsor = check_sort('iBagSize', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th class="center-align">
                                                <span>Order</span> <?php $nsor = check_sort('iDisplayOrder', $q); ?>
                                                <a href="<?php echo base_url('admin/vehicleType') . $nsor->link; ?>">
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
                                                    <td><?php echo $type->vLocationName; ?></td>
                                                    <td><?php echo $type->fPricePerKM; ?></td>
                                                    <td><?php echo $type->fPricePerMin; ?></td>
                                                    <td><?php echo $type->iBaseFare; ?></td>
                                                    <td><?php echo $type->fCommision; ?></td>
                                                    <td><?php echo $type->iPersonSize; ?></td>
                                                    <td><?php echo $type->iBagSize; ?></td>
                                                    <td><?php echo $type->iDisplayOrder; ?></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" href="<?php echo "vehicleType/showAddVehicleTypeForm?iVehicleTypeId=" . $type->iVehicleTypeId; ?>">Edit</a>
                                                        <a class="btn btn-sm btn-danger deleteVehicleType" data-attr="<?php echo $type->iVehicleTypeId; ?>">Delete</a>
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