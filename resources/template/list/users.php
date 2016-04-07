<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/user.php');
	require_once($rootPath.'/resources/template/types/user.php');

	$userHandler = new userHandler();
	//var_dump($userHandler->select($_GET['lastElement'])); exit();
	$users = $userHandler->select($_GET['lastElement']);	
	echo json_encode($users);	
?>