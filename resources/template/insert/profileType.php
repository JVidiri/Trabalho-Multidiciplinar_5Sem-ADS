<?php
/* 
  Insert a profileType in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/profileType.php');

/*
	Verify if the profileType information is in _POST var.
*/
if ( isset($_POST['name']) && isset($_POST['description']) ){
	$name = $_POST['name'];
	$description = $_POST['description'];	
		
	$newprofileType = new profileType(NULL, $name, $description);	
	$profileTypeHandler = new profileTypeHandler();
	$profileTypeHandler->insert($newprofileType);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>