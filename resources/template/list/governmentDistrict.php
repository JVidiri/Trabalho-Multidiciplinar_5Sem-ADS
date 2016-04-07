<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/governmentDistrict.php');	

	$governmentDistrictHandler = new governmentDistrictHandler();
	//var_dump($badgeHandler->select($_GET['lastElement'])); exit();
	$governmentDistricts = $governmentDistrictHandler->select($_GET['lastElement']);
	echo json_encode($governmentDistricts);
?>