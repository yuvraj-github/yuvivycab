let RentalPackage = {}
RentalPackage = {
    deleteRentalPackage: function(rentalPackageId) { 
        $.ajax({
            method: "POST",
            url: "deleteRentalPackage",
            dataType: "json",
            data: {'rentalPackageId': rentalPackageId},
            success: function (response) {
                if (response.type == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    window.location.href = "";
                } else {
                    alert(response.message);
                }
            }
        })
    },
    addRentalPackage: function (that) {
        $(that).validationEngine(ValidationOption);
        var result = $(that).validationEngine('validate');
        if (!result) {
            return false;
        }
        var formData = $(that).serialize();
        $.ajax({
            method: "POST",
            url: "saveRentalPackage",
            dataType:"json",
            data: formData,
            success: function(response) {
                if(response.type == 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
                    window.location.href = "";
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
$(document).on('submit', '#addRentalPackage', function (e) {
    e.preventDefault();
    RentalPackage.addRentalPackage(this);
})
$(document).on('click', '.deleteRentalPackage', function (e) {
    e.preventDefault();
    let rentalPackageId = $(this).attr('data-attr');
    RentalPackage.deleteRentalPackage(rentalPackageId);
})