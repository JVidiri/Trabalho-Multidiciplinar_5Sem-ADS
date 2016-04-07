<div class="login-container">
	<h3>Login</h3>
	<form role="form" method="post" action="<?php echo $submitAction ?>">
		<label class="form-group">
			<h4>E-mail: </h4>
			<input type="text" class="form-control" name="mail" required />			
			<div class="bar"></div>
		</label>	
		<label class="form-group">
			<h4>Senha: </h4>
			<input type="password" class="form-control" name="password" required />			
			<div class="bar"></div>
		</label>
		<div class="form-group">
			<input type="submit" class="btn btn-default" value="Logar" />
			<a href="/Trabalho-Multidiciplinar_5Sem-ADS/user/register.php" class="btn btn-default">Registrar-se</a>
		</div>		
	</form>
</div>