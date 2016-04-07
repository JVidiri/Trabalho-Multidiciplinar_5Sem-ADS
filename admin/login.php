<?php require_once('head.php'); ?>
<?php require_once($rootPath.'/resources/adminAccessControl.php'); ?>
<body>
	<div class="error">
		<p>
			<?php if (isset($accessErrorMessage))
				echo $accessErrorMessage;
			?>
		</p>
	</div>
	<?php		
		$submitAction = 'index.php';
		include($rootPath. '/resources/template/form/adminLogin.php');
	?>	
</body>
</html>