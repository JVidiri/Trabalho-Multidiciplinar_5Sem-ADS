<?php
/* 
  Insert a badge in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/badge.php');

/*
	Verify if the badge information is in _POST var.
*/
if ( isset($_POST['type']) && isset($_POST['title']) && 
		isset($_POST['description']) && isset($_POST['thumb'])){
	$type = $_POST['type'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	//TODO verificar como fazer o upload do arquivo.
	$thumb = $_POST['thumb'];
	
	$newBadge = new badge(NULL, $name, $type, $title, $description, $thumb);	
	$badgeHandler = new badgeHandler();
	$badgeHandler->insert($newBadge);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>