<?php
	require_once('accessControl.php');
?>
<html>
<head>
	<title>Login</title>
	<?php
		require_once('head.php');
	?>
</head>
<body>
	<h3>Login</h3>
	<?php $submitAction = '../index.php' ?>
	<?php include('form/form_userLogin.php'); ?>
</body>
</html>