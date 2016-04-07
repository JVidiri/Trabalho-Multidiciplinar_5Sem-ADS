<?php
/* 
  Insert a new user in the database
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/user.php');

/*
	Verify if the user information is in _POST var.
*/
if ( isset($_POST['mail']) && isset($_POST['name']) && 
		isset($_POST['password']) && isset($_POST['confirm_password'])){
	$mail = $_POST['mail'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$password_confirm = $_POST['confirm_password'];

	if ($password == $password_confirm){		
		$date = (new DateTime())->Format('Y-m-d H:i:s');
		$newUser = new user(NULL, $name, $mail, $password, 0, $date, NULL);
		//echo $newUser->is_confirmed;
		$userHandler = new userHandler();
		$userHandler->insert($newUser);		
		$RegisterOk = "Registrado com sucesso! <a href=\"login.php\">Faça login</a>";
	}else{
		$RegisterError = "Não registrado com sucesso tente novamente.";
	}	
	exit;
}

?>