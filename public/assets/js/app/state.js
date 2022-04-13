let State = {}
State = {
    getCities: function (iStateId) {
        $.ajax({
            method: "POST",
            url: baseUrl+"/admin/state/getAllCities",
            dataType: "json",
            data: { 'iStateId': iStateId },
            success: function (response) {
                if (response.type == 'success') {
                    $('#vCity').html(response.cities);
                } else {
                    alert(response.message);
                }
            }
        })
    },
}
$(document).on('change', '#vState', function (e) {    
    var iStateId = $(this).val();
    if (iStateId != '') {
        State.getCities(iStateId);
    }
});