$(function () {
    $('.select2').select2();
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $('#addForm').validate({
        rules: {
            vLicencePlate: {
                required: true,
            },              
        },
        messages: {
            vLicencePlate: {
                required: "This field is required.",
            },         
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });   
});
let ADD = {}
ADD = { 
    save: function (that) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/driverVehicles/save",
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json",
            data: new FormData(that),
            success: function (response) {
                if (response.type == 'success') {
                    window.location.href = '';
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            }
        })
    },
}
$(document).on('submit', '#addForm', function (e) {
    e.preventDefault();
    var iMakeId = $('#iMakeId').val();
    var iModelId = $('#iModelId').val();
    var iYear = $('#iYear').val();
    var iCompanyId = $('#iCompanyId').val();
    var iDriverId = $('#iDriverId').val();

    if (iMakeId == '') {
        $('.makeError').text('This field is required.');
        return false;
    } else {
        $('.makeError').text('');
    }
    if (iModelId == '') {
        $('.modelError').text('This field is required.');
        return false;
    } else {
        $('.modelError').text('');
    }
    if (iYear == '') {
        $('.yearError').text('This field is required.');
        return false;
    } else {
        $('.yearError').text('');
    }
    if (iCompanyId == '') {
        $('.companyError').text('This field is required.');
        return false;
    } else {
        $('.companyError').text('');
    }
    if (iDriverId == '') {
        $('.driverError').text('This field is required.');
        return false;
    } else {
        $('.driverError').text('');
    }
    ADD.save(this);
});
$('.vCarType').bootstrapSwitch({
    onSwitchChange: function (e, state) {
        var vCarType = e.target.checked;
        if (vCarType == true) {
            $(this).closest('.row').find('.rentalClass').show();
        } else {
            $(this).closest('.row').find('.rentalClass').hide();
        }        
    }
});