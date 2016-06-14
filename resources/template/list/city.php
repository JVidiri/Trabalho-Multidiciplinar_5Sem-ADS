<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/city.php');
	require_once($rootPath.'/resources/adminAccessControl.php');

	$cityHandler = new cityHandler();
	//var_dump($badgeHandler->select($_GET['lastElement'])); exit();
	$cities = $cityHandler->select($_GET['lastElement']);
	echo json_encode($cities);
?>