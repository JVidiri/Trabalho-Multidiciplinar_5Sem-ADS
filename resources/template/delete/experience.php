<?php
/* 
  Deletes a experience in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/experience.php');

/*
	Verify if the experience information is in _POST var.
*/
if ( isset($_POST['experienceId']) ){
	$experienceId = $_POST['experienceId'];	

	$experienceHandler = new experienceHandler();
	$experienceHandler->delete($experienceId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>