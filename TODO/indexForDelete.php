<?php
/* 
  Deletes a entry in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/admin.php');

$requestBody = file_get_contents('php://input');
echo $requestBody;
$object = json_decode($requestBody);
$objectId = $object->id;
$adminHandler = new adminHandler();
$adminHandler->delete($adminId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>