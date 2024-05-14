<?php


require_once('./config.php');


if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $azul = $_POST['azul'];
    $laranja = $_POST['laranja'];
    $vermelho = $_POST['vermelho'];
    $roxo = $_POST['roxo'];
    $verde = $_POST['verde'];
    $tempo = $_POST['tempo'];


    $insert_query = "INSERT INTO usuario (nome, email, azul, laranja, vermelho, roxo, verde, tempo) VALUES ('$nome', '$email', '$azul', '$laranja', '$vermelho', '$roxo', '$verde', '$tempo')";
    $result_sql = mysqli_query($link, $insert_query);

    if ($result_sql) {
        $response_array['status'] = 'success';
        $response_array['query'] =  $insert_query;
    } else {
        $response_array['status'] = 'error';
        $response_array['message'] = 'Failed to insert data into the database';
    }

} else {
    $response_array['status'] = 'vazio';
}

header('Content-type: application/json');
echo json_encode($response_array);
?>
