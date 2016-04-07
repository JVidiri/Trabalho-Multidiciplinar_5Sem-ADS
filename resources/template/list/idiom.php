<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
	require_once($rootPath.'/resources/template/handler/idiom.php');	

	$idiomHandler = new idiomHandler();
	//var_dump($idiomHandler->select($_GET['lastElement'])); exit();
	$idioms = $idiomHandler->select($_GET['lastElement']);
	echo json_encode($idioms);
?>