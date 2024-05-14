// Função para atualizar a exibição das divs com base no estado dos botões
function atualizarExibicao() {
    // Obter a largura da tela
    var screenWidth = window.innerWidth;

    var tabButtonRosa = document.querySelector('.tablinks.rosa-button.active');
    var tabButtonRoxo = document.querySelector('.tablinks.roxo-button.active');
    var tabJardim1 = document.querySelector('#primeira');
    var tabJardim2 = document.querySelector('#segunda');
    var div_v1_t3 = document.querySelector('.t3');
    var div_v1_t2 = document.querySelector('.t2');
    var div_v1_t1 = document.querySelector('.t1');
    var div_v2_t3 = document.querySelector('.tela-desk-segunda-edicao');
    var div_v2_t2 = document.querySelector('.tela-tablet-segunda-edicao');
    var div_v2_t1 = document.querySelector('.tela-mobile-segunda-edicao');

    if (tabButtonRoxo) {
        tabJardim1.style.display = 'block';
        tabJardim2.style.display = 'none';
    } else if (tabButtonRosa) {
        tabJardim1.style.display = 'none';
        tabJardim2.style.display = 'block';
    }

    if (screenWidth > 991) {
        if (tabButtonRosa) {
            div_v2_t3.style.display = 'block';
            div_v2_t2.style.display = 'none';

            div_v1_t3.style.display = 'none';
            div_v1_t2.style.display = 'none';
            div_v1_t1.style.display = 'none';
        } else if (tabButtonRoxo) {
            div_v2_t3.style.display = 'none';
            div_v2_t2.style.display = 'none';

            div_v1_t3.style.display = 'block';
            div_v1_t2.style.display = 'none';
            div_v1_t1.style.display = 'none';
        }
    } else if (screenWidth > 767) {
        if (tabButtonRosa) {
            div_v2_t3.style.display = 'none';
            div_v2_t2.style.display = 'block';

            div_v1_t3.style.display = 'none';
            div_v1_t2.style.display = 'none';
            div_v1_t1.style.display = 'none';
        } else if (tabButtonRoxo) {
            div_v2_t3.style.display = 'none';
            div_v2_t2.style.display = 'none';

            div_v1_t3.style.display = 'none';
            div_v1_t2.style.display = 'block';
            div_v1_t1.style.display = 'none';
        }
    } else if (screenWidth < 767) {
        if (tabButtonRosa) {
            div_v2_t3.style.display = 'none';
            div_v2_t2.style.display = 'block';

            div_v1_t3.style.display = 'none';
            div_v1_t2.style.display = 'none';
            div_v1_t1.style.display = 'none';
        } else if (tabButtonRoxo) {
            div_v2_t3.style.display = 'none';
            div_v2_t2.style.display = 'none';

            div_v1_t3.style.display = 'none';
            div_v1_t2.style.display = 'none';
            div_v1_t1.style.display = 'block';
        }
    }
}
document.querySelector('.tablinks.rosa-button').addEventListener('click', atualizarExibicao);
document.querySelector('.tablinks.roxo-button').addEventListener('click', atualizarExibicao);


window.addEventListener('resize', atualizarExibicao);
atualizarExibicao();
// Função para atualizar as coordenadas com base no novo tamanho da imagem
function atualizarCoordenadasMapa() {
    var LarguraTela = window.innerWidth;

    var largura_v1_desk_inicial = 1500;
    var largura_v1_tablet_inicial = 991;
    var largura_v1_mobile_inicial = 1080;
    var largura_v2_desk_inicial = 1920;
    var largura_v2_tablet_inicial = 1920;

    var largura_v2_desk   = document.querySelector('img[usemap="#jardim-desk-v2"]');
    var largura_v2_tablet = document.querySelector('img[usemap="#jardim-tablet-v2"]');
    var largura_v1_desk   = document.querySelector('img[usemap="#jardim3"]');
    var largura_v1_tablet = document.querySelector('img[usemap="#jardim2"]');
    var largura_v1_mobile = document.querySelector('img[usemap="#jardim1"]');

    var novoLargura_desk_v2   = largura_v2_desk.width;
    var novoLargura_tablet_v2 = largura_v2_tablet.width;
    var novoLargura_desk_v1   = largura_v1_desk_inicial;
    var novoLargura_tablet_v1 = novoLargura_tablet_v2;
    var novoLargura_mobile_v1 = novoLargura_tablet_v2;

    if(LarguraTela > 1500){
        var novoLargura_desk_v1  = largura_v1_desk_inicial;
    }else{
        var novoLargura_desk_v1 = largura_v2_desk.width;;
    }

    console.log("desk v2 " + novoLargura_desk_v2);
    console.log("tablet v2 " + novoLargura_tablet_v2);
    console.log("desk v1 " + novoLargura_desk_v1);
    console.log("tablet v1 " + novoLargura_tablet_v1);
    console.log("mobile v1 " + novoLargura_mobile_v1);
  
    var fator_reducao_desk_v1 = novoLargura_desk_v1 / largura_v1_desk_inicial;
    var fator_reducao_tablet_v1 = novoLargura_tablet_v1 / largura_v1_tablet_inicial;
    var fator_reducao_mobile_v1 = novoLargura_mobile_v1 / largura_v1_mobile_inicial;
    var fator_reducao_desk_v2 = novoLargura_desk_v2 / largura_v2_desk_inicial;
    var fator_reducao_tablet_v2 = novoLargura_tablet_v2 / largura_v2_tablet_inicial;

    var map_desk_v1 = document.querySelector('map[name="#jardim3"]');
    var map_tablet_v1 = document.querySelector('map[name="#jardim2"]');
    var map_mobile_v1 = document.querySelector('map[name="#jardim1"]');
    var map_desk_v2 = document.querySelector('map[name="#jardim-desk-v2"]');
    var map_tablet_v2 = document.querySelector('map[name="#jardim-tablet-v2"]');

    var areas_desk_v1 = map_desk_v1.getElementsByTagName('area');
    var areas_tablet_v1 = map_tablet_v1.getElementsByTagName('area');
    var areas_mobile_v1 = map_mobile_v1.getElementsByTagName('area');
    var areas_desk_v2 = map_desk_v2.getElementsByTagName('area');
    var areas_tablet_v2 = map_tablet_v2.getElementsByTagName('area');

    var coordenadas_desk_v1 = [];
    var coordenadas_tablet_v1 = [];
    var coordenadas_mobile_v1 = [];
    var coordenadas_desk_v2 = [];
    var coordenadas_tablet_v2 = [];

    if (LarguraTela > 991) {
        for (var i = 0; i < areas_desk_v1.length; i++) {
            var coords_desk_v1 = areas_desk_v1[i].getAttribute('coords');
            coordenadas_desk_v1.push(coords_desk_v1);
        }
        for (var i = 0; i < areas_desk_v2.length; i++) {
            var coords_desk_v2 = areas_desk_v2[i].getAttribute('coords');
            coordenadas_desk_v2.push(coords_desk_v2);
        }

        for (var i = 0; i < coordenadas_desk_v1.length; i++) {
            var coordenadasAtuais_desk_v1 = coordenadas_desk_v1[i].split(',');
            for (var j = 0; j < coordenadasAtuais_desk_v1.length; j++) {
                var valorAtual_desk_v1 = parseInt(coordenadasAtuais_desk_v1[j], 10);
                valorAtual_desk_v1 = Math.round(valorAtual_desk_v1 * fator_reducao_desk_v1);
                coordenadasAtuais_desk_v1[j] = valorAtual_desk_v1.toString();
            }
            coordenadas_desk_v1[i] = coordenadasAtuais_desk_v1.join(',');
        }
        for (var i = 0; i < coordenadas_desk_v2.length; i++) {
            var coordenadasAtuais_desk_v2 = coordenadas_desk_v2[i].split(',');
            for (var j = 0; j < coordenadasAtuais_desk_v2.length; j++) {
                var valorAtual_desk_v2 = parseInt(coordenadasAtuais_desk_v2[j], 10);
                valorAtual_desk_v2 = Math.round(valorAtual_desk_v2 * fator_reducao_desk_v2);
                coordenadasAtuais_desk_v2[j] = valorAtual_desk_v2.toString();
            }
            coordenadas_desk_v2[i] = coordenadasAtuais_desk_v2.join(',');
        }

        for (var i = 0; i < areas_desk_v1.length; i++) {
            areas_desk_v1[i].setAttribute('coords', coordenadas_desk_v1[i]);
        }
        for (var i = 0; i < areas_desk_v2.length; i++) {
            areas_desk_v2[i].setAttribute('coords', coordenadas_desk_v2[i]);
        }

    } else if (LarguraTela > 767) {
        for (var i = 0; i < areas_tablet_v1.length; i++) {
            var coords_tablet_v1 = areas_tablet_v1[i].getAttribute('coords');
            coordenadas_tablet_v1.push(coords_tablet_v1);
        }
        for (var i = 0; i < areas_tablet_v2.length; i++) {
            var coords_tablet_v2 = areas_tablet_v2[i].getAttribute('coords');
            coordenadas_tablet_v2.push(coords_tablet_v2);
        }

        for (var i = 0; i < coordenadas_tablet_v1.length; i++) {
            var coordenadasAtuais_tablet_v1 = coordenadas_tablet_v1[i].split(',');
            for (var j = 0; j < coordenadasAtuais_tablet_v1.length; j++) {
                var valorAtual_tablet_v1 = parseInt(coordenadasAtuais_tablet_v1[j], 10);
                valorAtual_tablet_v1 = Math.round(valorAtual_tablet_v1 * fator_reducao_tablet_v1);
                coordenadasAtuais_tablet_v1[j] = valorAtual_tablet_v1.toString();
            }
            coordenadas_tablet_v1[i] = coordenadasAtuais_tablet_v1.join(',');
        }
        for (var i = 0; i < coordenadas_tablet_v2.length; i++) {
            var coordenadasAtuais_tablet_v2 = coordenadas_tablet_v2[i].split(',');
            for (var j = 0; j < coordenadasAtuais_tablet_v2.length; j++) {
                var valorAtual_tablet_v2 = parseInt(coordenadasAtuais_tablet_v2[j], 10);
                valorAtual_tablet_v2 = Math.round(valorAtual_tablet_v2 * fator_reducao_tablet_v2);
                coordenadasAtuais_tablet_v2[j] = valorAtual_tablet_v2.toString();
            }
            coordenadas_tablet_v2[i] = coordenadasAtuais_tablet_v2.join(',');
        }

        for (var i = 0; i < areas_tablet_v1.length; i++) {
            areas_tablet_v1[i].setAttribute('coords', coordenadas_tablet_v1[i]);
        }
        for (var i = 0; i < areas_tablet_v2.length; i++) {
            areas_tablet_v2[i].setAttribute('coords', coordenadas_tablet_v2[i]);
        }
    } else if (LarguraTela < 767) {
        for (var i = 0; i < areas_mobile_v1.length; i++) {
            var coords_mobile_v1 = areas_mobile_v1[i].getAttribute('coords');
            coordenadas_mobile_v1.push(coords_mobile_v1);
        }
        for (var i = 0; i < areas_tablet_v2.length; i++) {
            var coords_tablet_v2 = areas_tablet_v2[i].getAttribute('coords');
            coordenadas_tablet_v2.push(coords_tablet_v2);
        }
        for (var i = 0; i < coordenadas_mobile_v1.length; i++) {
            var coordenadasAtuais_mobile_v1 = coordenadas_mobile_v1[i].split(',');
            for (var j = 0; j < coordenadasAtuais_mobile_v1.length; j++) {
                var valorAtual_mobile_v1 = parseInt(coordenadasAtuais_mobile_v1[j], 10);
                valorAtual_mobile_v1 = Math.round(valorAtual_mobile_v1 * fator_reducao_mobile_v1);
                coordenadasAtuais_mobile_v1[j] = valorAtual_mobile_v1.toString();
            }
            coordenadas_mobile_v1[i] = coordenadasAtuais_mobile_v1.join(',');
        }
        for (var i = 0; i < coordenadas_tablet_v2.length; i++) {
            var coordenadasAtuais_tablet_v2 = coordenadas_tablet_v2[i].split(',');
            for (var j = 0; j < coordenadasAtuais_tablet_v2.length; j++) {
                var valorAtual_tablet_v2 = parseInt(coordenadasAtuais_tablet_v2[j], 10);
                valorAtual_tablet_v2 = Math.round(valorAtual_tablet_v2 * fator_reducao_tablet_v2);
                coordenadasAtuais_tablet_v2[j] = valorAtual_tablet_v2.toString();
            }
            coordenadas_tablet_v2[i] = coordenadasAtuais_tablet_v2.join(',');
        }
        for (var i = 0; i < areas_mobile_v1.length; i++) {
            areas_mobile_v1[i].setAttribute('coords', coordenadas_mobile_v1[i]);
        }
        for (var i = 0; i < areas_tablet_v2.length; i++) {
            areas_tablet_v2[i].setAttribute('coords', coordenadas_tablet_v2[i]);
        }
    }
}
window.addEventListener('load', atualizarCoordenadasMapa);

