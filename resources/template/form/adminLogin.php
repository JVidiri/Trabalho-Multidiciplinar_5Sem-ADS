<div class="login-container">//interface para executar login
	<h3>Login</h3>
	<form role="form" method="post" action="<?php echo $submitAction ?>">//utilização do metodo post para envio de dados
		<label class="form-group">
			<h4>Name: </h4>
			<input type="text" class="form-control" name="name" required />	//nome somente recebera um texto		
			<div class="bar"></div>
		</label>	
		<label class="form-group">
			<h4>Senha: </h4>
			<input type="password" class="form-control" name="password" required />			
			<div class="bar"></div>
		</label>
		<div class="form-group">
			<input type="submit" class="btn btn-default" value="Logar" />			
		</div>		
	</form>
</div>
