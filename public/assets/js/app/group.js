let Group = {}
Group = {
    deleteGroup: function(groupId) { 
        $.ajax({
            method: "POST",
            url: "groups/deleteGroup",
            dataType: "json",
            data: {'groupId': groupId},
            success: function (response) {
                if (response.type == 'success') {
                    window.location.href = "groups";
                } else {
                    alert(response.message);
                }
            }
        })
    },
    addGroup: function (that) {
        $(that).validationEngine(ValidationOption);
        var result = $(that).validationEngine('validate');
        if (!result) {
            return false;
        }
        var formData = $(that).serialize();
        $.ajax({
            method: "POST",
            url: "saveGroupDetails",
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
                    alert(response.message);
                }
            }
        })
    }
}
$(document).on('submit', '#addGroup', function (e) {
    e.preventDefault();
    Group.addGroup(this);
})
$(document).on('click', '.deleteGroup', function (e) {
    e.preventDefault();
    let groupId = $(this).attr('data-attr');
    Group.deleteGroup(groupId);
})