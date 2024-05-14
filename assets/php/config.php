<?php

$tipo_conexao = $_SERVER['HTTP_HOST'];

if (($tipo_conexao == 'localhost') || ($tipo_conexao == '127.0.0.1')){

    $servidor = "localhost";
    $usuario = "will";
    $senha = "Publicidade_1";
    $banco = "cross";  
    // para uso local
  
}else{
  
    $servidor = "localhost";
    $usuario = "u747662728_willian";
    $senha = "Publicidade1@";
    // $banco = "u747662728_desafio_1";  
    $banco = "u747662728_cross";  
}

$link = mysqli_connect($servidor, $usuario, $senha, $banco);
mysqli_set_charset( $link, 'utf8');
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
