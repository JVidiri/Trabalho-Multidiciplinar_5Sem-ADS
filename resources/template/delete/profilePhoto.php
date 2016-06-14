<?php
/* 
  Deletes a profilePhoto in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/profilePhoto.php');

/*
	Verify if the profilePhoto information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$profilePhoto = json_decode($requestBody);
$profilePhotoId = $profilePhoto->profilePhoto_id;
$profilePhotoHandler = new profilePhotoHandler();
$profilePhotoHandler->delete($profilePhotoId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>