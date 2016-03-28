<form role="form" method="post" action="<?php echo $submitAction ?>"> <!-- that must be secure, don't put the cad_... page here! -->	
	<label class="form-group">
		<spam>E-mail: </spam>
		<input type="text" class="form-control" name="mail" required />			
	</label>	
	<label class="form-group">
		<spam>Senha: </spam>
		<input type="password" class="form-control" name="password" required />			
	</label>		
	<div class="form-group">
		<input type="submit" class="btn btn-default" value="Logar" />
	</div>
</form>