let COMPANY = {}
COMPANY = {
    getDrivers: function (iCompanyId) {
        $.ajax({
            method: "POST",
            url: baseUrl+"/admin/company/getDrivers",
            dataType: "json",
            data: { iCompanyId: iCompanyId },
            success: function (response) {
                if (response.type == 'success') {
                    $('#iDriverId').html(response.drivers);
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
$(document).on('change', '#iCompanyId', function (e) {    
    var iCompanyId = $(this).val();
    if (iCompanyId != '') {
        COMPANY.getDrivers(iCompanyId);
    }
});