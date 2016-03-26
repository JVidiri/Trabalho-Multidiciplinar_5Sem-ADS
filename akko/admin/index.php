<?php 
	require_once('../template/sql/dbFacade.php');	
?>
<html>
<head>
	<?php require_once('../template/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="../style/admin.css">
	<title>Akko Admin</title>	
</head>
<body>
	<div class="header">
		<h1>Akko Admin</h1>
		<!--TODO add a sessions as soon it is working -->
	</div>
	<div class="leftMenu">
		<ul>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createUser.php');" target="#content">User</a></li>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createBadge.php');" target="#content">Badges</a></li>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createCountry.php');" target="#content">Country</a></li>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createGovernmentDistrict.php');" target="#content">Government District</a></li>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createGrade.php');" target="#content">Grade</a></li>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createIdiom.php');" target="#content">Idiom</a></li>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createProfile.php');" target="#content">Profile</a></li>
			<li><a href="javascript:clientSideRequest('content', '../template/form/form_createProfileType.php');" target="#content">Profile Type</a></li>
		</ul>
	</div>
	<div class="contentAdmin" id="content">
		<h3>Bem vindo, selecione uma das opções no menu ao lado.</h3>
	</div>
</body>
</html>