<?php
/* 
  Insert a badge in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/grade.php');

/*
	Verify if the badge information is in _POST var.
*/
if ( isset($_POST['title']) && isset($_POST['pontuation']) && 
		isset($_POST['fk_country_id']) ){
	$title = $_POST['title'];
	$pontuation = $_POST['pontuation'];
	$fk_country_id = $_POST['fk_country_id'];
	
	$newGrade = new grade(NULL, $title, $pontuation, $fk_country_id);	
	$gradeHandler = new gradeHandler();
	$gradeHandler->insert($newGrade);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>