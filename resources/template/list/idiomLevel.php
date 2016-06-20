<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/idiomLevel.php');

	$idiomLevelHandler = new idiomLevelHandler();
	//var_dump($idiomLevelHandler->select($_GET['lastElement'])); exit();
	$idiomLevels = $idiomLevelHandler->select($_GET['lastElement']);
	echo json_encode($idiomLevels);
?>