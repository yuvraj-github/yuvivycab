<script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-validation/additional-methods.min.js'); ?>"></script>
<style>
    .errorClass {
        text-align: center;
        font-size: 16px;
    }
</style>
<form id="walletForm" method="POST">
    <div class="modal-content">
        <div class="modal-header" style="background-color: #1fbad6;">
            <h4 class="modal-title">Add Balance</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Entered Amount Will Be Added Directly To Driver's Account.</p>
            <div class="form-group row">
                <label for="iBalance" class="col-sm-4 col-form-label">Enter Amount</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="iBalance" name="iBalance">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btnSave">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="hidden" name="eTransRequest" id="eTransRequest" value="">
            <input type="hidden" name="eType" id="eType" value="<?php echo $eType; ?>">
            <input type="hidden" name="eFor" id="eFor" value="<?php echo $eFor; ?>">
            <input type="hidden" name="userID" id="userID" value="<?php echo $userID; ?>">
            <input type="hidden" name="eUserType" id="eUserType" value="<?php echo $eUserType; ?>">
            <input type="hidden" name="iUserWalletID" id="iUserWalletID" value="<?php echo $iUserWalletID; ?>">
        </div>
    </div>
</form>
<!-- /.modal-content -->
<script>
    $(function() {
        $('#walletForm').validate({
            rules: {
                iBalance: {
                    required: true,
                    number: true
                },
            },
            messages: {
                iBalance: {
                    required: "This field is required.",
                    number: "Please enter numbers only."
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback errorClass');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

    });
</script>