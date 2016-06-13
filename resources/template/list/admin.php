<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/admin.php');
	require_once($rootPath.'/resources/adminAccessControl.php');

	$adminHandler = new adminHandler();
	//var_dump($adminHandler->select($_GET['lastElement'])); exit();
	$admins = $adminHandler->select($_GET['lastElement']);	
	echo json_encode($admins);
?>