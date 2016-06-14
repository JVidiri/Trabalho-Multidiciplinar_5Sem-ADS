<?php
/* 
  Deletes a badge in the database.  
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
$badgeId = $badge->badge_id;
$badgeHandler = new badgeHandler();
$badgeHandler->delete($badgeId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>