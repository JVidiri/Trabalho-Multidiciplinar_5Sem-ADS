<?php
/* 
  Access control functions.

  This file just handle logged user and redirects the user to
the login page if it is not logged.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/handler/admin.php');

/* Start a php session handler. */
session_start();
if (isset($_GET['logoff'])){
	unset($_SESSION['name']);
	unset($_SESSION['password']);
	$accessErrorMessage = 'logoff.';
}else{
	/*
		Verify if the user information is already in _SESSION 
		or is a new request in _POST var yet.
	*/
	if ( isset($_POST["name"]) ){
		$name = $_POST["name"];
	}else if ( isset($_SESSION["name"]) ){
		$name =	 $_SESSION["name"];	
	}

	if ( isset($_POST["password"]) ){
		$password = $_POST["password"];
	}else if ( isset($_SESSION["password"]) ){
		$password =	 $_SESSION["password"];
	}

	/* If is not set the user don't login yet. */
	if( (!isset($name)) || (!isset($password))) {	
		$accessErrorMessage = 'Acesso apenas para administradores cadastrados faça <a href="login.php">login</a>';		
	}else{
		$_SESSION['name'] = $name;
		$_SESSION['password'] = $password;

		$adminHandler = new adminHandler();

		/* Verify the user with the name and password. */
		$result = $adminHandler->verifyByNameAndPassword($name, $password);

		/* If it is not in the database, it not exists yet. */
		if ($result == NULL){
			unset($_SESSION['name']);
			unset($_SESSION['password']);			
			$accessErrorMessage = 'Usuário e senha incorretos.';		
		}else{			
			$username = $result->name;
		}
	}
}
?>