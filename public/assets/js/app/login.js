const ValidationOption = {
    maxErrorsPerField: 1,
    inlineValidation: true,
    autoHidePrompt: true,
    autoHideDelay: 5000
}
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
const Login = {
    loginMember: function (that) {
        $(that).validationEngine(ValidationOption);
        var result = $(that).validationEngine('validate');
        if (!result) {
            return false;
        }
        var formData = $(that).serialize();
        $.ajax({
            method: "POST",
            url: "login/loginUser",
            dataType:"json",
            data: formData,
            success: function(response) {
                if(response.type == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    window.location.href = "dashboard";
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            }
        })
    }
}
$(document).on('submit', '#memberLogin', function (e) {
    e.preventDefault();
    Login.loginMember(this);
})