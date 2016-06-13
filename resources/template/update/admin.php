<?php
/* 
  Insert a admin in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/admin.php');

/*
	Verify if the admin information is in _POST var.
*/
if ( isset($_POST['name']) && isset($_POST['pass_hash']) && isset($_POST['adminId']) ){
	$adminId = $_POST['adminId'];
	$name = $_POST['name'];
	$password = $_POST['pass_hash'];

	$newAdmin = new admin($adminId, $name, $pass_hash);
	$adminHandler = new adminHandler();
	$adminHandler->update($newAdmin);
	echo json_encode("Atualizado com sucesso.");
	exit;
}
?>