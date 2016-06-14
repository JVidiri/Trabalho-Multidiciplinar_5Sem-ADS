<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/badgeType.php');
	require_once($rootPath.'/resources/adminAccessControl.php');

	$badgeTypeHandler = new badgeTypeHandler();	
	$badgeTypes = $badgeTypeHandler->select($_GET['lastElement']);
	echo json_encode($badgeTypes);
?>