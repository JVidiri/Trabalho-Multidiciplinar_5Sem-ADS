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
$admin = json_decode($requestBody);
if ($admin){
	$name = $admin->name;
	$password = $admin->password;	
	$password_confirmation = $admin->password_conf;

	if ($password == $password_confirmation){
		$newAdmin = new admin(NULL, $name, $password);	
		$adminHandler = new adminHandler();
		$adminHandler->insert($newAdmin);
		echo json_encode("{ret: \"Registrado com sucesso.\"}");
		exit;
	}else{
		echo json_encode("{ret: \"Erro no registro.\"}");
		exit;
	}
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>