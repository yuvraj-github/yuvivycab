$(function () {
    $('.select2').select2();
});
let Rider = {}
Rider = {
    save: function (that) {
        $(that).validationEngine(ValidationOption);
        var result = $(that).validationEngine('validate');
        if (!result) {
            return false;
        }
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/rider/save",
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
    delete: function(iUserId) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/rider/changeStatus",
            dataType: "json",
            data: {
                'iUserId': iUserId, 
                'eStatus' : 'Deleted'
            },
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
    }
}
$(document).on('change', '#vImage', function (e) {
    var that = $(this);
    var fileSize = this.files[0].size
    Rider.validateFile(that, fileSize);
});
$(document).on('submit', '#addForm', function (e) {
    e.preventDefault();
    Rider.save(this);
});
$(document).on('click','.deleteRider', function() {
    let iUserId = $(this).attr('data-attr');
    Rider.delete(iUserId);
})