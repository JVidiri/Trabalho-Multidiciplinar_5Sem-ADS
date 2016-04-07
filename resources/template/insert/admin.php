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
if ( isset($_POST['name']) && isset($_POST['pass_hash']) ){
	$name = $_POST['name'];	
	$pass_hash = $_POST['pass_hash'];
	
	$newAdmin = new admin(NULL, $name, $pass_hash);	
	$adminHandler = new adminHandler();
	$adminHandler->insert($newAdmin);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>