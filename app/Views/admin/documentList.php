<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documents</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" class="btn btn-block btn-primary" onclick="javascript:window.top.close();">CLOSE</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <hr>
    <!-- Main content -->
    <section class="content">
        <?php showMessage(); ?>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <?php foreach ($documentList as $key => $val) { ?>
                    <div class="col-md-3">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header" style="text-align: center;">
                                <span><?php echo $val->doc_name; ?></span>
                                <input type="hidden" value="<?php echo $val->doc_name; ?>">
                            </div>
                            <div class="card-body" align="center">
                                <?php
                                if ($val->doc_file != '') { ?>
                                    <img src="<?php echo base_url($filePath . '/' . $val->doc_file); ?>" alt="your image" width="180px;" />
                                <?php } else {
                                    echo $val->doc_name;
                                }
                                ?>
                            </div>
                            <div class="card-footer" align="center">
                                <a href="javscript:void(0)" class="btn btn-primary btnDocument" data-docusertype=<?php echo $docUsertype; ?> data-docmasterid=<?php echo $val->doc_masterid; ?> data-userid=<?php echo $ID; ?>><?php echo $val->doc_name; ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="docModal">

    <div class="modal-dialog">
        <div id="modalContent">

        </div>
    </div>

    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script src="<?php echo base_url('assets/js/app/document.js'); ?>"></script>
