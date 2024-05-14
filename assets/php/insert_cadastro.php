<?php

require_once('./config.php');
date_default_timezone_set('America/Sao_Paulo');



if ($_POST) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $emailResponsavel = $_POST['email_responsavel'];
    @$emailResponsavel1 = $_POST['email_responsavel1'];
    @$emailResponsavel2 = $_POST['email_responsavel2'];
    @$emailResponsavel3 = $_POST['email_responsavel3'];
    @$emailResponsavel4 = $_POST['email_responsavel4'];


    $area = $_POST['area'];
    $pergunta_1 = '..';
    $pergunta_2 = '..';
    $pergunta_3 = '..';
    $pergunta_4 = '..';
    $pergunta_5 = '..';

    $valores = array($emailResponsavel, $emailResponsavel1, $emailResponsavel2, $emailResponsavel3, $emailResponsavel4);
    $valores_string = implode(' , ', $valores);


    $arquivo = rand(0, 10000) . "-" . $_FILES["arquivo"]["name"];

    $tname = $_FILES["arquivo"]["tmp_name"];

    $uploads_dir = './uploads';
    $extensao = pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION);


    if ($_FILES["arquivo"]["type"] == "application/vnd.ms-excel" || $_FILES["arquivo"]["type"] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $_FILES["arquivo"]["type"] == 'application/vnd.openxmlformats-officedocument.presentationml.presentation' || filesize($tname) == 0 || $extensao == "ppt" || $extensao == "pptx") {
        move_uploaded_file($tname, $uploads_dir . '/' . $arquivo);

        if ($_FILES["arquivo"]["size"] === 0) {
            $sql = "INSERT INTO usuario (nome, email, email_responsavel, area_atuacao, pergunta_1, pergunta_2,pergunta_3,pergunta_4,pergunta_5) 
        VALUES('$nome','$email', '$valores_string', '$area', '$pergunta_1','$pergunta_2','$pergunta_3','$pergunta_4','$pergunta_5')";
            $result_sql = mysqli_query($link, $sql);
            if ($result_sql) {
                $response_array['status'] = 'success';
            } else {
                $response_array['status'] = $valores;
            }
        } else {
            $sql = "INSERT INTO usuario (email, email_responsavel, area_atuacao, pergunta_1, pergunta_2,pergunta_3,pergunta_4,pergunta_5,arquivo) 
        VALUES('$email', '$valores_string', '$area', '$pergunta_1','$pergunta_2','$pergunta_3','$pergunta_4','$pergunta_5', '$arquivo')";
            $result_sql = mysqli_query($link, $sql);
            if ($result_sql) {
                $response_array['status'] = 'success';
            } else {
                $response_array['status'] = $valores;
            }
        }

    } else {
        $response_array['status'] = $valores;
    }
}
header('Content-type: application/json');
echo json_encode($response_array);