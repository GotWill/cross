// Wait for the DOM to be ready
$(function () {
    $('form#loginForm').validate({
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        errorElement: "span",

        submitHandler: function (form) {
            $.ajax({
                url: '../assets/php/login.php',
                type: 'POST',
                data: $(form).serialize(),
                success: function (data) {
                    if (data.status == "success") {
                        window.location.href = data.url;
                    } else {
                        document.querySelector(".alert").style.display = "block"
                    }
                },
            });
        },
    });
});

function closeButton(){
    document.querySelector(".alert").style.display = "none"
}