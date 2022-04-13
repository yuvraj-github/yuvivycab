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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Groups List</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <a href="groups/showAddGroupsForm" class="btn btn-sm btn-primary">Add New Group</a>
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
                                                <span>Group</span> <?php $nsor = check_sort('group_name', $q); ?>
                                                <a href="<?php echo base_url('admin/groups') . $nsor->link; ?>">
                                                    <i class="fa <?php echo $nsor->class; ?>"></i>
                                                </a>
                                            </th>
                                            <th>
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
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($groups)) {
                                            $count = 0;
                                            foreach ($groups as $group) { ?>
                                                <tr>
                                                    <td><?php echo ++$count; ?></td>
                                                    <td><?php echo $group->group_name; ?></td>
                                                    <td><?php echo status($group->status); ?></td>
                                                    <td><?php echo $group->name; ?></td>
                                                    <td><?php echo uiDate($group->creation_date); ?></td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" href="<?php echo "groups/showAddGroupsForm?gId=".$group->id; ?>">Edit</a>
                                                        <a class="btn btn-sm btn-danger deleteGroup" href="javascript:void()" data-attr="<?php echo (isset($group)) ? $group->id : ''; ?>">Delete</a>
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