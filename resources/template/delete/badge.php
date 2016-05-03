<?php
/* 
  Deletes a badge in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/badge.php');

/*
	Verify if the badge information is in _POST var.
*/
if ( isset($_POST['badgeId']) ){
	$badgeId = $_POST['badgeId'];	

	$badgeHandler = new badgeHandler();
	$badgeHandler->delete($badgeId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>