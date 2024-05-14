var emailError = $('#error-email')
var emailErrorResponsavel = $('#error-email-responsavel')


// $("#nextBtn").attr("disabled","disabled");


$(document).ready(function() {
    $('input').keypress(function(e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);
        return (code == 13) ? false : true;
    });
});



$(function() {

    $('form#regForm').validate({
        errorElement: "span",


        submitHandler: function(form) {
            var formData = new FormData(document.getElementById("regForm"));

            var hasFile = [...formData.values()].some(value => value instanceof File);

            if(hasFile){
                $("#loading").show()
            }


           


            $.ajax({
                type: 'POST',
                url: 'assets/php/insert_cadastro.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data.status == "success") {
                       localStorage.clear()
                        Swal.fire({
                            title: 'Cadastrado com sucesso',
                            text: 'Em breve nossa equipe entrará em contato com você.',
                            icon: "success"
                        }).then(function() {
                           $.ajax({
                               url: 'assets/php/email.php',
                               type: 'POST',
                               data: $(form).serialize(),
                               success: function(data) {
                                   if (data.status == 'success') {
                                       window.location.reload();
                                   } else {
                                    window.location.reload();
                                   }
                               }
                           });
                           window.location.reload();
                        });
                        


                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Ops... Ocorreu um erro',
                            text: 'Somente arquivos Excel ou PowerPoint.',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            closeOnClickOutside: false,
                        }).then(function() {
                             location.reload();
                        });
                    }

                }
            });
        }


    })
});


const addButton = document.getElementById('addButton');
const inputContainer = document.getElementById('inputContainer');
let count = 1;

addButton.addEventListener('click', (e) => {
    e.preventDefault()

    const inputWrapper = document.createElement('div');

    const newInput = document.createElement('input');
    newInput.classList.add('sombra-js')

    newInput.setAttribute('type', 'email');
    newInput.setAttribute('name', `email_responsavel${count}`);
    newInput.setAttribute('id', `email_responsavel${count}`);

    const removeButton = document.createElement('button');
    removeButton.classList.add('remove-button')
    removeButton.textContent = 'Remover';
    removeButton.addEventListener('click', () => {
        inputWrapper.remove();
    });

    inputWrapper.appendChild(newInput);
    inputWrapper.appendChild(removeButton);
    inputContainer.appendChild(inputWrapper);

    count++;
});