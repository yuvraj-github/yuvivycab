<script src="<?php echo base_url('assets/js/app/user.js'); ?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Admin User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Admin User</li>
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
                                <h3 class="card-title">Users List</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="users/showAddUsersForm" class="btn btn-sm btn-primary">Add New User</a>
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
                                                <span>First Name</span> <?php $nsor = check_sort('first_name', $q); ?>
                                                <a href="<?php echo base_url('admin/users') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th>
                                                <span>Last Name</span> <?php $nsor = check_sort('last_name', $q); ?>
                                                <a href="<?php echo base_url('admin/users') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th>
                                                <span>Email</span> <?php $nsor = check_sort('email', $q); ?>
                                                <a href="<?php echo base_url('admin/users') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <!-- <th>
                                                <span>Status</span> <?php $nsor = check_sort('status', $q); ?>
                                                <a href="<?php echo base_url('admin/groups') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th>
                                                <span>Created By</span> <?php $nsor = check_sort('created_by', $q); ?>
                                                <a href="<?php echo base_url('admin/groups') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th>
                                                <span>Creation Date</span> <?php $nsor = check_sort('creation_date', $q); ?>
                                                <a href="<?php echo base_url('admin/groups') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($users)) {
                                            $count = 0;
                                            foreach ($users as $user) { ?>
                                                <tr>
                                                    <td><?php echo ++$count; ?></td>
                                                    <td><?php echo $user->first_name; ?></td>
                                                    <td><?php echo $user->last_name; ?></td>
                                                    <td><?php echo $user->email; ?></td>
                                                    <!-- <td><?php // echo status($group->status); ?></td> -->
                                                    <!-- <td><?php // echo uiDate($group->creation_date); ?></td> -->
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" href="<?php echo "users/showAddUsersForm?uId=".$user->id; ?>">Edit</a>
                                                        <a class="btn btn-sm btn-danger deleteUser" href="javascript:void(0)" data-attr="<?php echo (isset($user)) ? $user->id : ''; ?>">Delete</a>
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