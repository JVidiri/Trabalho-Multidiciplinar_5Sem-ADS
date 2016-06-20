<?php
/* 
  Insert a admin in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/badge.php');

/*
	Verify if the admin information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){
	$id = $data->badge_id;
	$type = $data->fk_type_id;
	$title = $data->title;
	$description = $data->description;	
	$thumb = $data->thumb;

	$newBadge = new badge($id, $type, $title, $description, $thumb);	
	var_dump($newBadge);
	$badgeHandler = new badgeHandler();
	$badgeHandler->insert($newBadge);
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>