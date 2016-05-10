<?php
/* 
  Insert a admin in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/admin.php');

/*
	Verify if the admin information is in _POST var.
*/
if ( isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password_conf']) ){
	$name = $_POST['name'];

	$password = $_POST['password'];	
	$password_confirmation = $_POST['password_conf'];

	if ($password == $password_confirmation){
		$newAdmin = new admin(NULL, $name, $password);	
		$adminHandler = new adminHandler();
		$adminHandler->insert($newAdmin);
		echo json_encode("Registrado com sucesso");
		exit;
	}else{
		echo json_encode("Erro no registro");
		exit;
	}
}
?>