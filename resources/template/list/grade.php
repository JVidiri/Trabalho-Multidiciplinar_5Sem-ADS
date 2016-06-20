<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/grade.php');

	$gradeHandler = new gradeHandler();
	//var_dump($badgeHandler->select($_GET['lastElement'])); exit();
	$grades = $gradeHandler->select($_GET['lastElement']);
	echo json_encode($grades);
?>