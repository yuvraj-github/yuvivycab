let Permission = {}
Permission = {
    addGroup: function (that) {
        $(that).validationEngine(ValidationOption);
        var result = $(that).validationEngine('validate');
        if (!result) {
            return false;
        }
        var formData = $(that).serialize();
        $.ajax({
            method: "POST",
            url: "permissions/saveGroupPermissionMapping",
            dataType:"json",
            data: formData,
            success: function(response) {
                if(response.type == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    $('#saveGroupPermissionMapping').reset();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    })
                }
            }
        })
    }
}
$(document).on('submit', '#saveGroupPermissionMapping', function (e) {
    e.preventDefault();
    Permission.addGroup(this);
})