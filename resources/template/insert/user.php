<?php
/* 
  Insert a new user in the database
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/user.php');

/*
	Verify if the user information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){
	$mail = $data->mail;
	$name = $data->name;
	$password = $data->password;
	$password_confirm = $data->confirm_password;

	if ($password == $password_confirm){		
		$date = (new DateTime())->Format('Y-m-d H:i:s');
		$newUser = new user(NULL, $name, $mail, $password, 0, $date, NULL);		
		$userHandler = new userHandler();
		$userHandler->insert($newUser);		
		echo json_encode("{ret: \"Registrado com sucesso.\"}");
		exit;
	}else{
		echo json_encode("{ret: \"Erro no registro.\"}");
		exit;
	}
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}

?>