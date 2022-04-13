let VehicleType = {}
VehicleType = {
    deleteVehicleType: function (iVehicleTypeId) {
        $.ajax({
            method: "POST",
            url: "vehicleType/deleteVehicleType",
            dataType: "json",
            data: { 'iVehicleTypeId': iVehicleTypeId },
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
    addVehicleType: function (that) {
        $(that).validationEngine(ValidationOption);
        var result = $(that).validationEngine('validate');
        if (!result) {
            return false;
        }
        var formData = $(that).serialize();
        $.ajax({
            method: "POST",
            url: "saveVehicleType",
            dataType: "json",
            data: formData,
            success: function (response) {
                if (response.type == 'success') {
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
$(function () {
    $('.select2').select2();
    $('.slide_table').slideUp();
    $('.slide_table_cancel').slideUp();
    setTimeout(function () {
        $('#fPricePerKM_Button').trigger('click');
        $('#iCancellationTimeLimit_Button').trigger('click');
    }, 1000);

    setTimeout(function () {
        $('#fPricePerKM_Button').trigger('click');
        $('#iCancellationTimeLimit_Button').trigger('click');
    }, 1000);

    $('.clockpicker-with-callbacks').clockpicker();
});
$(document).on('submit', '#addVehicleType', function (e) {
    e.preventDefault();
    VehicleType.addVehicleType(this);
})
$(document).on('click', '.deleteVehicleType', function (e) {
    e.preventDefault();
    let iVehicleTypeId = $(this).attr('data-attr');
    VehicleType.deleteVehicleType(iVehicleTypeId);
})

$(document).on('click', '#fPricePerKM_Button', function () {
    var display = $('.slide_table').css('display');
    if (display == 'none') {
        $(this).val('Click here to close Slab');
    } else {
        $(this).val('Click here to add Slab');
    }
    $('.slide_table').slideToggle();
})
$(document).on('click', '#iCancellationTimeLimit_Button', function () {
    var display = $('.slide_table_cancel').css('display');
    if (display == 'none') {
        $(this).val('Click here to close Slab');
    } else {
        $(this).val('Click here to add Slab');
    }
    $('.slide_table_cancel').slideToggle();
});

$(document).on('click', '.slide_table .add_new', function () {
    // var length = $('.slide_table .delete').length;
    var html = `'<tr class="range">
                    <td>
                        <input class="form-control" type="text" name="from[]" placeholder="from" >
                    </td>
                    <td>
                        <input type="text" class="form-control" name="to[]" placeholder="to" >
                    </td>
                    <td>
                        <input type="text" class="form-control" name="price[]" placeholder="price" >
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger delete">Delete</button>
                    </td>
                </tr>'`;
    $(this).parents('tr').before(html);
});
$(document).on('click', '.slide_table_cancel .add_new', function () {
    var html = `'<tr class="range">
                    <td>
                        <input class="form-control num_only" type="text" name="from_charges[]" placeholder="from" >
                    </td>
                    <td class="pluss">
                        <input type="text" class="form-control" name="to_charges[]" placeholder="to" >
                    </td>
                    <td class="pluss">
                        <span>%</span>
                        <input type="text" class="form-control num_only" name="charges[]" placeholder="price" >
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger delete">Delete</button>
                    </td>
                </tr>'`;
    $(this).parents('tr').before(html);
});
$(document).on('click', '.slide_table .delete,.slide_table_cancel .delete', function(){
    // var length = $('.slide_table .delete').length;
    if(confirm("Do you really want to delete?")){
        $(this).parents('tr').remove();
    }
});
function showpoolpercentage() {
    if ($('input[name=ePoolStatus]').is(':checked')) {
        alert('111');
        $("#pool_div").show();
        $(".RentalAlias,#fWaitingFeesDiv,#iWaitingFeeTimeLimitDiv,#MotoBike,#Cycle,#Truck").hide();
        $("#eIconType").val("Car")
        $("#fPoolPercentage").addClass('validate[required]');
    } else {
        alert('Not checked');
        $("#pool_div").hide();
        $(".RentalAlias,#fWaitingFeesDiv,#iWaitingFeeTimeLimitDiv,#MotoBike,#Cycle,#Truck").show();
        $("#fPoolPercentage").removeClass('validate[required]')
    }
}
function showhidepickuptime() {
    if ($('input[name=ePickStatus]').is(':checked')) {
        //alert('Checked');
        $("#showpickuptime").show();
    } else {
        //alert('Not checked');
        $("#showpickuptime").hide();
    }
}
function showhidepickuptimeBookingCom() {
    if ($('input[name=ePickStatusBookingCom]').is(':checked')) {
        //alert('Checked');
        $("#showpickuptimeBookingCom").show();
    } else {
        //alert('Not checked');
        $("#showpickuptimeBookingCom").hide();
    }
}
function showhidenighttime() {
    if ($('input[name=eNightStatus]').is(':checked')) {
        $("#shownighttime").show();
        $("#tNightStartTime").addClass('validate[required]');
        $("#tNightEndTime").addClass('validate[required]');
    } else {
        $("#shownighttime").hide();
        $("#tNightStartTime").removeClass('validate[required]');
        $("#tNightEndTime").removeClass('validate[required]');
    }
}
