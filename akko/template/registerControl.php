<?php
/* 
  Access control functions.

  This file just handle logged user and redirects the user to
the login page if it is not logged.
*/
require_once($absolutPath . '/template/sql/dbFacade.php');
require_once($absolutPath . '/template/sql/handlers/userHandler.php');

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

		$userHandler = new userHandler();
		$userHandler->insert($newUser);
	}
	echo "Registrado com sucesso!";
	exit;
}

?>