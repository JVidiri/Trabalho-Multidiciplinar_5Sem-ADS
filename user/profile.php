<?php require_once('head.php');?>
<?php require_once($rootPath.'/resources/accessControl.php'); ?>
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
		include($rootPath. '/resources/template/form/createProfile.php');
	?>	
</body>
</html>