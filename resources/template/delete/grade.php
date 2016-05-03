<?php
/* 
  Deletes a grade in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/grade.php');

/*
	Verify if the grade information is in _POST var.
*/
if ( isset($_POST['gradeId']) ){
	$gradeId = $_POST['gradeId'];	

	$gradeHandler = new gradeHandler();
	$gradeHandler->delete($gradeId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>