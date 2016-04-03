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
	</div>
	<div>	
	<div class="content">		
		<h3>Hello <?php echo $username ?> <br />Site under contruction...</h3>
	</div>
	<div class="content">
		<p><a href="?logoff=1">Sair</a></p>
	</div>
	<div class="botton">
	</div>
</body>
</html>