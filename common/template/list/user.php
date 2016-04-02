<?php
	include_once('../../inc.php');
	include_once(ROOT_PATH.'common/template/sql/handlers/userHandler.php');

	$userHandler = new userHandler();
	//var_dump($userHandler->select($_GET['offset'])); exit();
	$users = $userHandler->select($_GET['offset']);
	echo json_encode($users);
?>