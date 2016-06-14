<?php
/* 
  Insert a badge in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/grade.php');

/*
	Verify if the badge information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){
	$title = $data->title;
	$pontuation = $data->pontuation;
	$fk_country_id = $data->fk_country_id;
	
	$newGrade = new grade(NULL, $title, $pontuation, $fk_country_id);	
	$gradeHandler = new gradeHandler();
	$gradeHandler->insert($newGrade);
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>