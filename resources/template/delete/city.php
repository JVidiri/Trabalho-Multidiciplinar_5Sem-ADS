<?php
/* 
  Deletes a city in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/city.php');

/*
	Verify if the city information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
echo $requestBody;
$city = json_decode($requestBody);
$cityId = $city->city_id;
$cityHandler = new cityHandler();
$cityHandler->delete($cityId);
echo json_encode("Deletado com sucesso.");
exit;
?>