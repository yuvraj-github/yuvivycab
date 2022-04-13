let User = {}
User = {
    deleteUser: function(userId) { 
        $.ajax({
            method: "POST",
            url: "users/deleteUser",
            dataType: "json",
            data: {'userId': userId},
            success: function (response) {
                if (response.type == 'success') {
                    window.location.href = "users";
                } else {
                    alert(response.message);
                }
            }
        })
    },
    addUser: function (that) {
        $(that).validationEngine(ValidationOption);
        var result = $(that).validationEngine('validate');
        if (!result) {
            return false;
        }
        var formData = $(that).serialize();
        $.ajax({
            method: "POST",
            url: "saveUserDetails",
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
$(document).on('submit', '#addUser', function (e) {
    e.preventDefault();
    User.addUser(this);
})
$(document).on('click', '.deleteUser', function (e) {
    e.preventDefault();
    let userId = $(this).attr('data-attr');
    User.deleteUser(userId);
})