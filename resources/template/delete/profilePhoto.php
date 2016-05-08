<?php
/* 
  Deletes a profilePhoto in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/profilePhoto.php');

/*
	Verify if the profilePhoto information is in _POST var.
*/
if ( isset($_POST['profilePhotoId']) ){
	$profilePhotoId = $_POST['profilePhotoId'];	

	$profilePhotoHandler = new profilePhotoHandler();
	$profilePhotoHandler->delete($profilePhotoId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>