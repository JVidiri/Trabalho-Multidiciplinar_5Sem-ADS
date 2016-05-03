<?php
/* 
  Deletes a user in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/user.php');

/*
	Verify if the user information is in _POST var.
*/
if ( isset($_POST['userId']) ){
	$userId = $_POST['userId'];	

	$userHandler = new userHandler();
	$userHandler->delete($userId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>