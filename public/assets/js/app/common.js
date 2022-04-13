const ValidationOption = {
    maxErrorsPerField: 1,
    inlineValidation: true,
    autoHidePrompt: true,
    autoHideDelay: 5000,
    // position: topLeft
}
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});