<?php
/* 
  Insert a profileType in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/profileType.php');

/*
	Verify if the profileType information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){
	$name = $data->name;
	$description = $data->description;
		
	$newprofileType = new profileType(NULL, $name, $description);	
	$profileTypeHandler = new profileTypeHandler();
	$profileTypeHandler->insert($newprofileType);
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>