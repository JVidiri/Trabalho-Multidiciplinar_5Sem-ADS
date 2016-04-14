<?php 
	require_once('head.php');
	require_once($rootPath.'/resources/template/handler/profileType.php');
?>
<body>
	<div class="error">
		<p>
			<?php if (isset($accessErrorMessage))
				echo $accessErrorMessage;
			?>
		</p>
	</div>
	<?php		
		$submitAction = '#';
		include($rootPath. '/resources/template/form/createProfile.php');
	?>	
</body>
</html>