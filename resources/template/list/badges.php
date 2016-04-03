<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/badge.php');	

	$badgeHandler = new badgeHandler();
	//var_dump($badgeHandler->select($_GET['lastElement'])); exit();
	$badges = $badgeHandler->select($_GET['lastElement']);
	echo json_encode($badges);
?>