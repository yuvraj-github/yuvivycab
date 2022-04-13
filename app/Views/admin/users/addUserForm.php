<script src="<?php echo base_url('assets/js/app/user.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Users</h1>
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
                                <h3 class="card-title"><?php echo $action; ?> User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form id="addUser">
                                    <input type="hidden" name="userId" value="<?php echo (!empty($userDetail)) ? $userDetail['row']->id : ''; ?>" />
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">Group:</label>
                                                <select class="form-control validate[required]" data-prompt-position="topLeft" name="groupId">
                                                    <option value="">Select Group</option>
                                                    <?php
                                                    $selected = '';
                                                    if (isset($groups) && !empty($groups)) {
                                                        foreach ($groups as $group) { 
                                                            if((!empty($userDetail)) && $userDetail['row']->group_id) {
                                                                $selected = ($group->id == $userDetail['row']->group_id) ? 'selected' : '';
                                                            }?>
                                                            <option value="<?php echo $group->id; ?>" <?php echo $selected; ?>>
                                                                <?php echo $group->group_name; ?>
                                                            </option>
                                                    <?php }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">First Name:</label>
                                                <input type="text" class="form-control validate[required]" data-prompt-position="topLeft" name="firstName" value="<?php echo (!empty($userDetail)) ? $userDetail['row']->first_name : "";  ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">Last Name:</label>
                                                <input type="text" class="form-control validate[required]" data-prompt-position="topLeft" name="lastName" value="<?php echo (!empty($userDetail)) ? $userDetail['row']->last_name : "";  ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">Phone:</label>
                                                <input type="text" class="form-control validate[required]" data-prompt-position="topLeft" name="phone" value="<?php echo (!empty($userDetail)) ? $userDetail['row']->phone : "";  ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">Status:</label>
                                                <select class="form-control validate[required]" name="status" data-prompt-position="topLeft">
                                                    <option value="">Select Status</option>
                                                    <option value="active" <?php echo (!empty($userDetail['row']->status) && $userDetail['row']->status == 'active') ? 'selected' : ''; ?>>Active</option>
                                                    <option value="in-active" <?php echo (!empty($userDetail['row']->status) && ($userDetail['row']->status == 'in-active')) ? 'selected' : ''; ?>>In-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">Email:</label>
                                                <input type="text" class="form-control validate[required]" data-prompt-position="topLeft" name="email" value="<?php echo (!empty($userDetail)) ? $userDetail['row']->email : "";  ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">Password:</label>
                                                <input value="" class="form-control validate[required]" data-prompt-position="topLeft" type="password" name="password" id="password">
                                                <!-- <input type="password" class="form-control validate[required]" data-prompt-position="topLeft" name="password" value=""> -->
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="mandatory">Confirm Password:</label>
                                                <input value="" class="form-control validate[required,equals[password]]" data-prompt-position="topLeft" type="password" name="password2" id="password2">
                                                <!-- <input type="password" class="form-control validate[required,equals[password]]" data-prompt-position="topLeft" name="confirmPassword" value=""> -->
                                            </div>
                                        </div>
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