<?php
/* 
  Insert a badge in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/badge.php');

/*
	Verify if the badge information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$badge = json_decode($requestBody);
if ($badge){
	$type = $badge->fk_type_id;
	$title = $badge->title;
	$description = $badge->description;	
	$thumb = $badge->thumb;

	$newBadge = new badge(NULL, $type, $title, $description, $thumb);	
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