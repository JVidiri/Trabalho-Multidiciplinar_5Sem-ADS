<?php
/* 
  Insert a idiom in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/idiom.php');

/*
	Verify if the idiom information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){
	$name = $data->name;
	$fk_country_id = $data->fk_country_id;	
	
	$newIdiom = new idiom(NULL, $name, $fk_country_id);	
	$idiomHandler = new idiomHandler();
	$idiomHandler->insert($newIdiom);
	$RegisterOk = "Registrado com sucesso!";	
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>