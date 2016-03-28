<?php
/* 
  Access control functions.

  This file just handle logged user and redirects the user to
the login page if it is not logged.
*/
require_once($absolutPath . '/template/sql/dbFacade.php');
require_once($absolutPath . '/template/sql/handlers/userHandler.php');

/* Start a php session handler. */
session_start();
if (isset($_GET['logoff'])){
	unset($_SESSION['mail']);
	unset($_SESSION['password']);
	echo "Vlw, flw!";
	exit;
}

/*
	Verify if the user information is already in _SESSION 
	or is a new request in _POST var yet.
*/
$mail = isset($_POST["mail"]) ? $_POST["mail"] : $_SESSION["mail"];
$password = isset($_POST['password']) ? $_POST['password'] : $_SESSION['password'];

/* If is not set the user don't login yet. */
if(!isset($mail)) {
	//Show The login form here.
	echo "<p>Acesso apenas para usuários cadastrados faça login ou cadastre-se</p>";
	include_once($absolutPath . '/login.php');
	echo "<a href=\"register.php\" class=\"btn btn-default\" >Registrar-se</a>";
	exit;
}

$_SESSION['mail'] = $mail;
$_SESSION['password'] = $password;

$userHandler = new userHandler();

/* Verify the user with the mail and password. */
$result = $userHandler->verifyByMailAndPassword($mail, $password);

/* If it is not in the database, it not exists yet. */
if ($result == NULL){
	unset($_SESSION['mail']);
	unset($_SESSION['password']);
	echo '<p class="error">Usuário e senha incorretos, <a href="register.php">cadastre-se!</a></p>';	
	exit;
}else{
	$username = $result->name;
}
?>