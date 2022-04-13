<script src="<?php echo base_url('assets/js/validation-engine/js/languages/jquery.validationEngine-en.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/validation-engine/js/jquery.validationEngine.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/app/permission.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Groups</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Permissions</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <form id="saveGroupPermissionMapping">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <div class="form-group">
                                        <label>Select Group:</label>
                                        <select class="form-control validate[required]" name="groupId">
                                            <option value="">Select Group</option>
                                            <?php
                                            if (isset($groups) && !empty($groups)) {
                                                foreach ($groups as $group) { ?>
                                                    <option value="<?php echo $group->id ?>">
                                                        <?php echo $group->group_name; ?>
                                                    </option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Permissions</h3>
                                    <!-- <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <input type="text" />
                                            <button class="btn btn-sm btn-primary">Search</button>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <div id="accordion">
                                        <section class="content pb-3">
                                            <div class="container-fluid h-100">
                                                <?php
                                                foreach ($permissions as $key => $permission) {
                                                    $firstArr = reset($permission); ?>
                                                    <div class="card card-row card-primary">
                                                        <div class="card-header">
                                                            <h4 class="card-title w-100">
                                                                <a class="d-block w-100" data-toggle="collapse" href="#collapse-<?php echo $key; ?>">
                                                                    <?php echo $firstArr->perm_group_name; ?>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse-<?php echo $key; ?>" class="collapse" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <p>Note : Please make sure to select "view-" permission if you are selecting any other permission for any section.</p>
                                                                <?php
                                                                foreach ($permission as $value) { ?>
                                                                    <div class="card card-light card-outline custom-card">
                                                                        <label><?php echo $value->permission_name; ?>
                                                                            <input type="checkbox" class="permission" name="permissions[]" value="<?php echo $value->id; ?>" />
                                                                        </label>
                                                                    </div>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-sm btn-primary margin-left-5">Save</button>
                                    <button type="reset" class="btn btn-sm btn-default margin-left-5">Reset</button>
                                    <button type="button" class="btn btn-sm btn-danger margin-left-5">Cancel</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>