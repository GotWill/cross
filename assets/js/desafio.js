let etapaAtual = 0;
let enviar = 0;



function proximoPasso() {
    if (etapaAtual < 2) {
        document.querySelectorAll('.etapa')[etapaAtual].style.display = 'none';
        etapaAtual++;
        document.querySelectorAll('.etapa')[etapaAtual].style.display = 'block';
    }
}

function validarEtapa1() {
    const nome = document.getElementById('desafio-nome').value;
    const email = document.getElementById('desafio-email').value;

    if (nome && email) {
        atualizarConfirmacao();
        proximoPasso();
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Ops... Campos Vazios',
            text: 'Preencha os campos antes de começar',
            allowOutsideClick: false,
            allowEscapeKey: false,
            closeOnClickOutside: false,
        })
    }
}

function validarEtapa2() {
    const azul = document.getElementById('p-azul').value;
    const laranja = document.getElementById('p-laranja').value;
    const vermelho = document.getElementById('p-vermelho').value;
    const roxo = document.getElementById('p-roxo').value;
    const verde = document.getElementById('p-verde').value;


    if (azul && laranja && vermelho && roxo && verde) {
        atualizarConfirmacao();
    } else {
        Swal.fire({
            icon: 'warning',
            title: 'Ops... Campos Vazios',
            text: 'Preencha os campos antes de começar',
            allowOutsideClick: false,
            allowEscapeKey: false,
            closeOnClickOutside: false,
        })
    }
}


const inputElements = document.querySelectorAll('.input-r');

// Adiciona um ouvinte de evento a cada elemento
inputElements.forEach(input => {
    input.addEventListener('input', function(event) {
        // Remove caracteres não numéricos do valor do campo de entrada
        const inputValue = this.value.replace(/\D/g, '');

        // Define o valor do campo de entrada como somente números
        this.value = inputValue;
    });
});

function atualizarConfirmacao() {

    const nome = document.getElementById('desafio-nome').value;
    const email = document.getElementById('desafio-email').value;

    const azul = document.getElementById('p-azul').value;
    const laranja = document.getElementById('p-laranja').value;
    const vermelho = document.getElementById('p-vermelho').value;
    const roxo = document.getElementById('p-roxo').value;
    const verde = document.getElementById('p-verde').value;

    enviar += 1;

    if (enviar == 2) {
        enviarDadosParaPHP(nome, email, azul, laranja, vermelho, roxo, verde);
    }
}

function enviarDadosParaPHP(nome, email, azul, laranja, vermelho, roxo, verde) {
   
    const tempo = document.getElementById('tempo').value;

    $.ajax({
        type: 'POST',
        url: 'assets/php/insert_cadastro.php',
        data: {
            nome: nome,
            email: email,
            azul: azul,
            laranja: laranja,
            vermelho: vermelho,
            roxo: roxo,
            verde: verde,
            tempo: tempo
        },
        success: function(data) {
            console.log("data", data);
            if (data.status == 'success') {
                proximoPasso()
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ops... Ocorreu um erro',
                    text: 'Tente Novamente mais tarde',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    closeOnClickOutside: false,
                }).then(function() {
                   window.location.reload();
                   // proximoPasso()
                });
            }
        }
    });
}