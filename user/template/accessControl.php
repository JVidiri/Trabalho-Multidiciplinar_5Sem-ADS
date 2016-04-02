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
	$errorMessage = 'Usuário fez logoff.';
	include_once($absolutPath . '/login.php');
	exit;
}

/*
	Verify if the user information is already in _SESSION 
	or is a new request in _POST var yet.
*/
if ( isset($_POST["mail"]) ){
	$mail = $_POST["mail"];
}else if ( isset($_SESSION["mail"]) ){
	$mail =	 $_SESSION["mail"];	
}

if ( isset($_POST["password"]) ){
	$password = $_POST["password"];
}else if ( isset($_SESSION["password"]) ){
	$password =	 $_SESSION["password"];
}

/* If is not set the user don't login yet. */
if( (!isset($mail)) || (!isset($password))) {
	//Show The login form here.
	$errorMessage = 'Acesso apenas para usuários cadastrados faça login ou cadastre-se';
	include_once($absolutPath . '/login.php');
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
	$errorMessage = 'Usuário e senha incorretos, <a href="register.php">cadastre-se!</a>';
	include_once($absolutPath . '/login.php');
	exit;		
}else{
	$username = $result->name;
}
?>