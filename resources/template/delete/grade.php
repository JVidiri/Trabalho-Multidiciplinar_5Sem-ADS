<?php
/* 
  Deletes a grade in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/grade.php');

/*
	Verify if the grade information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$grade = json_decode($requestBody);
$gradeId = $grade->grade_id;
$gradeHandler = new gradeHandler();
$gradeHandler->delete($gradeId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>