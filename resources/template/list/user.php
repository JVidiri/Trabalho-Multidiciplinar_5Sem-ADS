<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/sql/handlers/user.php');
	require_once($rootPath.'/resources/template/sql/handlers/user.php');

	$userHandler = new userHandler();
	//var_dump($userHandler->select($_GET['offset'])); exit();
	$users = $userHandler->select($_GET['lastuser']);	
	echo json_encode($users);	
?>