$(document).ready(function () {
    $('.select2').select2();
    $('[data-toggle="tooltip"]').tooltip();
});
let LISTVEHICLES = {}
LISTVEHICLES = {
    updateStatus: function (ID, actionStatus) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/driver/updateStatus",
            dataType: "json",
            data: { ID: ID, actionStatus: actionStatus },
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
