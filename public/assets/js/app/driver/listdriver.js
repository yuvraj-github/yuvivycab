$(document).ready(function () {
    $('.select2').select2();
    $('[data-toggle="tooltip"]').tooltip();
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

});
let LIST = {}
LIST = {
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
    deleteRecord: function (ID) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/driver/deleteRecord",
            dataType: "json",
            data: { ID: ID },
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
    updateMarkFavourite: function (ID, isFavurite) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/driver/updateMarkFavourite",
            dataType: "json",
            data: { isFavurite: isFavurite, ID: ID },
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
    var ID = $(this).data('id');
    if (confirm("Are you sure you want to " + actionStatus + " this?")) {
        LIST.updateStatus(ID, actionStatus);
    }
    else {
        return false;
    }
});
$(document).on('click', '.deleteRecord', function (e) {
    e.preventDefault();
    var ID = $(this).data('id');
    if (confirm("Are you sure you want to delete this?")) {
        LIST.deleteRecord(ID);
    }
    else {
        return false;
    }
})
$("[name='isFavurite']").bootstrapSwitch({
    onSwitchChange: function (e, state) {
        var isFavurite = e.target.checked;
        var ID = $(this).data('idriverid');
        var favouriteText = 'remove favourite mark from this driver';
        if (isFavurite == true) {
            favouriteText = 'mark this driver as favourite';
        }
        if (confirm("Are you sure you want to " + favouriteText + "?")) {
            LIST.updateMarkFavourite(ID, isFavurite);
        }
        else {
            return false;
        }
    }
});
$(document).on('click', '.btnExport', function (e) {
    e.preventDefault();
    if (confirm("Are you sure you want to export this?")) {
        window.location.href=baseUrl+"/admin/driver/exportRecord";
    }
    else {
        return false;
    }
})
