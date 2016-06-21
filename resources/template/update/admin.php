<?php
/* 
  Insert a admin in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/admin.php');

/*
	Verify if the admin information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){
	$id = $data->admin_user_id;
	$name = $data->name;		

	$adminToUpdate = new admin($id, $name, NULL);	
	$adminHandler = new adminHandler();
	$adminHandler->update($adminToUpdate);
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;	
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>