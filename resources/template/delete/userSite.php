<?php
/* 
  Deletes a userSite in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/userSite.php');

/*
	Verify if the userSite information is in _POST var.
*/
if ( isset($_POST['userSiteId']) ){
	$userSiteId = $_POST['userSiteId'];	

	$userSiteHandler = new userSiteHandler();
	$userSiteHandler->delete($userSiteId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>