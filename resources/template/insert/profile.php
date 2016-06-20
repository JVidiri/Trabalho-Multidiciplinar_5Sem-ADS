<?php
/* 
  Insert a profile in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/accessControl.php');
require_once($rootPath . '/resources/template/handler/profile.php');
require_once($rootPath . '/resources/template/handler/profilePhoto.php');

/*
	Verify if the profile information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){	
	$userId = $_SESSION['userId']; //$data->fk_user_id;
	$typeId = $data->fk_type_id;
	$completeName = $data->complete_name;
	$about = $data->about;
	$birth = $data->birth;
	$alias = $data->alias;
	$curriculum = $data->curriculum;

	$newProfile = new profile(NULL, $userId, $typeId, $completeName, $about, $birth, $alias, $curriculum);	
	$profileHandler = new profileHandler();
	$profile_id = $profileHandler->insert($newProfile);

	$profilePhoto = $data->photo_path;
	$date = (new DateTime())->Format('Y-m-d H:i:s');
	$newProfilePhoto = new profilePhoto(NULL, $profile_id, $profilePhoto, $date);
	$profilePhotoHandler = new profilePhotoHandler();
	$profilePhotoHandler->insert($newProfilePhoto);

	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;	
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>