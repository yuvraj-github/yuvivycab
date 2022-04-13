let Document = {}
Document = {
    validateFile: function (that, fileSize) {
        var val = that.val().toLowerCase();       
        var regex = new RegExp("(.*?)\.(jpg|jpeg|png|doc|docx|pdf|gif)$");
        if (!(regex.test(val))) {
            that.val('');
            $('.fileError').text('Please Upload valid file format. Valid formats are pdf,doc,docx,jpg,jpeg,gif,png.');
            return false;
        } else if (fileSize > 2000000) {
            that.val('');
            $('.fileError').text('Image file is not valid. File size should be less than or equal to 2MB.');
            return false;
        } else {
            $('.fileError').text('');
        }
    },
    saveDoc: function (that, docUserType) {        
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/"+docUserType+"/saveDoc",
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
    fetchDocModal: function (docUserID,docMasterID,docUsertype) {
        $.ajax({
            method: "POST",
            url: baseUrl + "/admin/"+docUsertype+"/fetchDocModal",            
            dataType: "html",  
            data: {docUserID:docUserID, docMasterID:docMasterID, docUsertype:docUsertype},          
            success: function (response) {                
                if (response) {
                    $('#modalContent').html(response);
                    $('#docModal').modal('show');
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
$(document).on('click', '.btnDocument', function (e) {
    var docUserID = $(this).data('userid');
    var docMasterID = $(this).data('docmasterid');
    var docUsertype = $(this).data('docusertype');
    Document.fetchDocModal(docUserID,docMasterID, docUsertype);  
});
$(document).on('change', '#vImage', function (e) {
    var that = $(this);
    var fileSize = this.files[0].size    
    const [file] = vImage.files
    if (file) {
      $('#blah').show();
      blah.src = URL.createObjectURL(file)
    }
    Document.validateFile(that, fileSize);
});
$(document).on('submit', '#docModalForm', function (e) {
    e.preventDefault();
    var file = $('#vImage').val();
    var docUserType = $('#docUserType').val();
    if(file == '') {
        Toast.fire({
            icon: 'error',
            title: 'Please select file to upload.'
        });
        return false;
    }    
    Document.saveDoc(this, docUserType);
});
