<?php

require_once('./config.php');

$email = $_POST['email'];


if ($_POST) {
	//consulta se email existe

	$select_email = "
	SELECT
		usuario.id
	FROM
	 usuario
	WHERE
	 usuario.email = '$email'
	";

	$result_email = mysqli_query($link, $select_email);

	if (mysqli_num_rows($result_email) >= 1) {
		$response_array['status'] = "success";
	}
	else {
		$response_array['status'] = "error";
	}/**/

	mysqli_close($link);
} else {
	$response_array['status'] = "vazio";
}

header('Content-type: application/json');
echo json_encode($response_array);
