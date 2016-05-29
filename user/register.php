<?php require_once('head.php');?>
<?php require_once($rootPath.'/resources/template/insert/user.php');?>
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
	<?php
		$submitAction = 'login.php';
		//include($rootPath.'/resources/template/form/userRegister.php');
		include($rootPath.'/resources/template/form/createProfile.php');
	?>
</body>
</html>