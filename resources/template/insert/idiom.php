<?php
/* 
  Insert a idiom in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/idiom.php');

/*
	Verify if the idiom information is in _POST var.
*/
if ( isset($_POST['name']) && isset($_POST['fk_country_id']) ){
	$name = $_POST['name'];
	$fk_country_id = $_POST['fk_country_id'];	
	
	$newIdiom = new idiom(NULL, $name, $fk_country_id);	
	$idiomHandler = new idiomHandler();
	$idiomHandler->insert($newIdiom);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>