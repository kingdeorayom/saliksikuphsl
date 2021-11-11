<script>
    function showHidePassword() {

        var checkboxShowHidePasswordValue = document.getElementById("textFieldPassword");
        var checkboxShowHideRepeatPasswordValue = document.getElementById("textFieldConfirmPassword");

        if (checkboxShowHidePasswordValue.type === "password") {
            checkboxShowHidePasswordValue.type = "text";
            checkboxShowHideRepeatPasswordValue.type = "text";
        } else {
            checkboxShowHidePasswordValue.type = "password";
            checkboxShowHideRepeatPasswordValue.type = "password";
        }
    }
</script>

<script>
    function fireSweetAlertResendVerificationCode() {
        Swal.fire({
            title: 'Request a new verification code?',
            showDenyButton: true,
            confirmButtonText: 'Yes',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('A new verification code is sent to your email!', '', 'success');
                location.reload();
            } else if (result.isDenied) {}
        })
    }
</script>

<script src="../../../scripts/bootstrap/bootstrap.js"></script>
<script src="../../../plugins/sweetalert/package/dist/sweetalert2.js"></script>