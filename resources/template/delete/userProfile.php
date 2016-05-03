<?php
/* 
  Deletes a userProfile in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/userProfile.php');

/*
	Verify if the userProfile information is in _POST var.
*/
if ( isset($_POST['userProfileId']) ){
	$userProfileId = $_POST['userProfileId'];	

	$userProfileHandler = new userProfileHandler();
	$userProfileHandler->delete($userProfileId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>