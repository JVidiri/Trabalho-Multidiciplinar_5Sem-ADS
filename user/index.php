<?php require_once('head.php');?>
<?php require_once($rootPath.'/resources/accessControl.php');?>
<body>
	<div class="error">
		<p>
			<?php 
				if (isset($accessErrorMessage)){
					echo $accessErrorMessage;
					exit;
				}
			?>
		</p>
	</div>
	<div class="header">		
		<p>Hello <?php echo $username ?> <br />Site under contruction...</p>
		<p><a href="login.php?logoff=1">Sair</a></p>
	</div>		
	<div class="content">
		
	</div>
	<div class="botton">
	</div>
</body>
</html>