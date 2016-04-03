<?php require_once('head.php');?>
<?php require_once($rootPath.'/resources/registerControl.php');?>
<body>
	<div class="error">
		<p>
			<?php 
				if (isset($RegisterError)){
					echo $RegisterError;
				}			
			?>
		</p>
	</div>
	<div class="ok">
		<p>
			<?php 
				if (isset($RegisterOk)){
					echo $RegisterOk;
				}
			?>
		</p>
	</div>
	<h3>Registre-se</h3>
	<?php
		$submitAction = '#';
		include($rootPath.'/resources/template/form/userRegister.php');
	?>
</body>
</html>