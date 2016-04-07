<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath . '/resources/template/handler/profileType.php');	

	$profileTypeHandler = new profileTypeHandler();
	//var_dump($profileTypeHandler->select($_GET['lastElement'])); exit();
	$profileTypesLevels = $profileTypeHandler->select($_GET['lastElement']);
	echo json_encode($profileTypesLevels);
?>