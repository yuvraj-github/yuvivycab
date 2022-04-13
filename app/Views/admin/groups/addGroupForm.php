<script src="<?php echo base_url('assets/js/validation-engine/js/languages/jquery.validationEngine-en.js') ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/validation-engine/js/jquery.validationEngine.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/app/group.js'); ?>"></script>
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
                                <li class="breadcrumb-item active">Groups</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $action; ?> Group</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <form id="addGroup">
                                    <input type="hidden" name="groupId" value="<?php echo (!empty($groupDetail)) ? $groupDetail['row']->id : ''; ?>" />
                                    <div class="form-group">
                                        <label>Group Name:</label>
                                        <input type="text" class="form-control validate[required]" name="groupName" value="<?php echo (!empty($groupDetail)) ? $groupDetail['row']->group_name : "";  ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Status:</label>
                                        <select class="form-control validate[required]" name="status">
                                            <option value="">Select Status</option>
                                            <option value="active" <?php echo (!empty($groupDetail['row']->status) && $groupDetail['row']->status == 'active') ? 'selected' : ''; ?>>Active</option>
                                            <option value="in-active" <?php echo (!empty($groupDetail['row']->status) && ($groupDetail['row']->status == 'in-active')) ? 'selected' : ''; ?>>In-Active</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo $action; ?>
                                    </button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
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