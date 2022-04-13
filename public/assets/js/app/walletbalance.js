let Walletbalance = {}
Walletbalance = {
    fetchWalletModal: function (userID, iUserWalletID) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/driver/fetchWalletModal",
            dataType: "html",
            data: { 'userID': userID, iUserWalletID: iUserWalletID },
            success: function (response) {
                if (response) {
                    $('#modalContent').html(response);
                    $('#walletModal').modal('show');
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            }
        })
    },
    saveWalletBalance: function (that) {       
        var formData = $(that).serialize();
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/driver/saveWalletBalance",
            dataType:"json",
            data: formData,
            success: function(response) {
                if(response.type == 'success') {                   
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
$(document).on('click', '.addBalance', function (e) {
    var userID = $(this).data('userid');
    var iUserWalletID = $(this).data('iuserwalletid');
    Walletbalance.fetchWalletModal(userID, iUserWalletID);
});
$(document).on('submit', '#walletForm', function (e) {
    e.preventDefault();
    var iBalance = $('#iBalance').val();
    if (parseFloat(iBalance) == 0) {
        Toast.fire({
            icon: 'error',
            title: 'You can not enter zero number.'
        });
        return false;
    }
    Walletbalance.saveWalletBalance(this);
});