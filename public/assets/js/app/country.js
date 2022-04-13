let Country = {}
Country = {
    getStates: function (vCountryCode) {
        $.ajax({
            method: "POST",
            url: baseUrl+"/admin/country/getStates",
            dataType: "json",
            data: { 'vCountryCode': vCountryCode },
            success: function (response) {
                if (response.type == 'success') {
                    $('#vState').html(response.states);
                    $('#phoneCode').text(response.phoneCode);
                    $('#vCode').val(response.phoneCode);
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
$(document).on('change', '#vCountry', function (e) {    
    var vCountryCode = $(this).val();
    if (vCountryCode != '') {
        Country.getStates(vCountryCode);
    }
});