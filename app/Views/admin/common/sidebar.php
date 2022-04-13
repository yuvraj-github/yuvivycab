<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">VYCabs</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name']; ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <?php // pre($sidebar); 
        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <?php
                if (!empty($sidebar)) {
                    foreach ($sidebar as $data) {
                        if (isset($data['children']) && !empty($data['children'])) { ?>
                            <li class="nav-item">
                                <a href="<?php echo site_url($data['url']); ?>" class="nav-link">
                                    <i class="<?php echo $data['icon']; ?>"></i>&nbsp;
                                    <p>
                                        <?php echo $data['title']; ?>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php
                                    foreach ($data['children'] as $child) { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url($child['url']); ?>" class="nav-link">
                                                <i class="<?php echo $child['icon']; ?>"></i>&nbsp;
                                                <p><?php echo $child['title']; ?></p>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                        <?php
                        } else { ?>
                            <li class="nav-item">
                                <a href="<?php echo site_url($data['url']); ?>" class="nav-link">
                                    <i class="<?php echo $data['icon']; ?>"></i>&nbsp;
                                    <p><?php echo $data['title']; ?></p>
                                </a>
                            </li>
                <?php
                        }
                    }
                }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>