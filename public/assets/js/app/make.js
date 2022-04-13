let MAKE = {}
MAKE = {
    getModels: function (iMakeId) {
        $.ajax({
            method: "POST",
            url: baseUrl+"/admin/make/getModels",
            dataType: "json",
            data: { iMakeId: iMakeId },
            success: function (response) {
                if (response.type == 'success') {
                    $('#iModelId').html(response.models);
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
$(document).on('change', '#iMakeId', function (e) {    
    var iMakeId = $(this).val();
    if (iMakeId != '') {
        MAKE.getModels(iMakeId);
    }
});