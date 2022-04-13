let LISTCOMPANY = {}
LISTCOMPANY = {   
    updateCompanyStatus: function (companyID, actionStatus) {        
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/company/updateCompanyStatus",          
            dataType: "json",
            data: {companyID:companyID, actionStatus:actionStatus},
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
    deleteCompany: function(companyID) { 
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/company/deleteCompany", 
            dataType: "json",
            data: {'companyID': companyID},
            success: function (response) {
                if (response.type == 'success') {
                    window.location.href = "";
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
$(document).on('click', '#actionStatus', function (e) {
    var actionStatus = $(this).data('status');
    var companyID = $(this).data('companyid');
    if (confirm("Are you sure you want to "+actionStatus+" this?")) {
        LISTCOMPANY.updateCompanyStatus(companyID, actionStatus);
    }
    else {
        return false;
    }
});
$(document).on('click', '.deleteCompany', function (e) {
    e.preventDefault();
    var companyID = $(this).data('companyid');
    if (confirm("Are you sure you want to delete this?")) {
        LISTCOMPANY.deleteCompany(companyID);
    }
    else {
        return false;
    }    
})
