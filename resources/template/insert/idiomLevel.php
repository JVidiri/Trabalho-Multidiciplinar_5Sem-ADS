<?php
/* 
  Insert a idiom in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/idiomLevel.php');

/*
	Verify if the idiom information is in _POST var.
*/
if ( isset($_POST['name']) && isset($_POST['description']) ){
	$name = $_POST['name'];
	$description = $_POST['description'];	
	
	$newIdiomLevel = new idiomLevel(NULL, $name, $description);	
	$idiomLevelHandler = new idiomLevelHandler();
	$idiomLevelHandler->insert($newIdiomLevel);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>