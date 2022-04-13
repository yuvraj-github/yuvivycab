<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<form id="docModalForm" method="POST" enctype="multipart/form-data">
    <div class="modal-content" style="width: 70%;">
        <div class="modal-header">
            <h4 class="modal-title"><?php echo !empty($docMasterDetails) ? $docMasterDetails->doc_name : ''; ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary" style="min-height: 180px;">
                        <div class="card-body">
                            <?php if (!empty($docMasterDetails) && $docMasterDetails->doc_file != '') { ?>
                                <img id="blah" src="<?php echo base_url($filePath . '/' . $docMasterDetails->doc_file); ?>" alt="your image" width="180px;" />
                            <?php } else { ?>
                                <img id="blah" src="#" alt="your image" width="180px;" />
                            <?php }?>
                        </div>
                    </div>
                    <input type="file" class="btn btn-primary" name="vImage" id="vImage">
                    <span class="fileError" style="color:red;"></span>
                </div>
            </div>
            <?php if (!empty($docMasterDetails) && $docMasterDetails->ex_status == 'yes') { ?>
                <hr>
                <div class="row">
                    <label>EXP.DATE</label>
                    <div class="input-group date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input expDate" name="expDate" data-date-format="yyyy-mm-dd" readonly='true' value="<?php echo !empty($docMasterDetails) ? $docMasterDetails->ex_date : ''; ?>"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="modal-footer" style="display: -webkit-box;">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <input type="hidden" name="docUserID" id="docUserID" value="<?php echo $docUserID; ?>">
            <input type="hidden" name="docMasterID" id="docMasterID" value="<?php echo !empty($docMasterDetails) ? $docMasterDetails->doc_masterid : ''; ?>">
            <input type="hidden" name="docUserType" id="docUserType" value="<?php echo $docUserType; ?>">
            <input type="hidden" name="docID" id="docID" value="<?php echo !empty($docMasterDetails) ? $docMasterDetails->doc_id  : ''; ?>">
        </div>
    </div>
</form>
<script>  
    $(document).on('click', '.expDate', function(e) {
        $(this).datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
            startDate: new Date()
        });
    });
</script>
<!-- /.modal-content -->