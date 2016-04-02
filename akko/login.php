<?php require_once('head.php'); ?>
<body>
	<div class="error">
		<p>
			<?php if (isset($errorMessage))
				echo $errorMessage;
			?>
		</p>
	</div>
	<?php		
		$submitAction = '#';
		include('template/form/form_userLogin.php');
	?>	
</body>
</html>