<?php 

require_once("./config.php");

if (!empty($_POST) AND (empty($_POST['email']) OR empty($_POST['senha']))) {
	$response_array['status'] = "erro";
}

$email = mysqli_real_escape_string($link, $_POST['email']);
$senha = mysqli_real_escape_string($link, $_POST['senha']);


$sql = "
SELECT 
 id AS `usuario_id`,
 email AS `email`, 
 senha As `senha` 
 FROM admin WHERE email = '". $email ."' 
 AND senha = '". sha1($senha) ."'
";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) != 1) {
	$response_array["status"] = "erro";
}else {
	$row = mysqli_fetch_assoc($result);

    if (!isset($_SESSION)) session_start();

    $_SESSION['UsuarioID']    = $row['usuario_id'];

    $response_array['url'] = "dashboard.php";

    $response_array['status'] = "success";
	// Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado

}
header('Content-type: application/json');
echo json_encode($response_array);
