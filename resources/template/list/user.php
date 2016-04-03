<?php
	include_once('../../inc.php');
	include_once(ROOT_PATH.'resources/template/sql/handlers/user.php');

	$userHandler = new userHandler();
	//var_dump($userHandler->select($_GET['offset'])); exit();
	$users = $userHandler->select($_GET['lastUser']);
	echo json_encode($users);
?>