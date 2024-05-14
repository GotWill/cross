$('form#regForm').validate({
    errorElement: "span",
         

    submitHandler: function(form){
        var formData = new FormData(document.getElementById("regForm"));
        var email = $("#email")
        var email_responsavel = $("#email_responsavel")
        var email_responsavel1 = $("#email_responsavel1")
        var email_responsavel2 = $("#email_responsavel2")
        var email_responsavel3 = $("#email_responsavel3")
        var email_responsavel4 = $("#email_responsavel4")

        $.ajax({
            url: 'assets/php/email.php',
            type: 'POST',
            data: $(form).serialize(),
            success: function (data) {
                if (data.status == 'success') {
                    console.log("disparou email")
                   
                }else {
                    console.log("error email")
                }
            }
        });

       
    }

   
})