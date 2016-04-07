<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/country.php');	

	$countryHandler = new countryHandler();
	//var_dump($countryHandler->select($_GET['lastElement'])); exit();
	$countries = $countryHandler->select($_GET['lastElement']);
	echo json_encode($countries);
?>