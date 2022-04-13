$(function () {
    $('.select2').select2();
    $('#addForm').validate({
        rules: {
            vName: {
                required: true,
                minlength: 2,
            },
            vLastName: {
                required: true,
                minlength: 2,
            },
            vEmail: {
                required: true,
                email: true,
            },
            vPassword: {
                required: true,
                minlength: 6
            },          
            vPhone: {
                required: true,
                minlength: 3,
                digits: true
            },   
            vPaymentEmail: {
                email: true,
            },       
        },
        messages: {
            vName: {
                required: "This field is required.",
                minlength: "First Name at least 2 characters long."
            },
            vLastName: {
                required: "This field is required.",
                minlength: "Last Name at least 2 characters long."
            },
            vEmail: {
                required: "This field is required.",
                email: "Please enter a valid email address"
            },
            vPassword: {
                required: "This field is required.",
                minlength: "Password at least 6 characters long."
            },         
            vPhone: {
                required: "This field is required.",
                minlength: "Please enter at least three Number.",
                digits: "Please enter proper mobile number."
            },    
            vPaymentEmail: {
                email: "Please enter a valid email address"
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
    var ID = $('#ID').val();
    if (ID != '') {
        $("#vPassword").rules("remove", "required");
    }
});
let ADD = {}
ADD = {
    validateFile: function (that, fileSize) {
        var val = that.val().toLowerCase();
        var regex = new RegExp("(.*?)\.(jpg|jpeg|png)$");
        if (!(regex.test(val))) {
            that.val('');
            $('.fileError').text('Image file is not valid. Valid formats are jpg,jpeg,png.');
        } else if (fileSize > 2000000) {
            that.val('');
            $('.fileError').text('Image file is not valid. File size should be less than or equal to 2MB.');
        } else {
            $('.fileError').text('');
        }
    },
    save: function (that) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/driver/save",
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
$(document).on('change', '#vImage', function (e) {
    var that = $(this);
    var fileSize = this.files[0].size
    ADD.validateFile(that, fileSize);
});
$(document).on('submit', '#addForm', function (e) {
    e.preventDefault();
    var country = $('#vCountry').val();
    var language = $('#vLang').val();
    var iCompanyId = $('#iCompanyId').val();
    var vCurrencyDriver = $('#vCurrencyDriver').val();
    if (country == '') {
        $('.countryError').text('This field is required.');
        return false;
    } else {
        $('.countryError').text('');
    }
    if (iCompanyId == '') {
        $('.companyError').text('This field is required.');
        return false;
    } else {
        $('.companyError').text('');
    }
    if (language == '') {
        $('.langError').text('This field is required.');
        return false;
    } else {
        $('.langError').text('');
    }
    if (vCurrencyDriver == '') {
        $('.currencyError').text('This field is required.');
        return false;
    } else {
        $('.currencyError').text('');
    }
    ADD.save(this);
});