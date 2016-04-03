<form role="form" method="post" action="<?php echo $submitAction ?>">
	<label class="form-group">		
		<spam><strong><abbr title="required">*</abbr></strong> Nome: </spam>
		<input type="text" class="form-control" name="name" required />
	</label>		
	<label class="form-group">
		<spam><strong><abbr title="required">*</abbr></strong> E-mail: </spam>
		<input type="text" class="form-control" name="mail" required />			
	</label>	
	<label class="form-group">
		<spam><strong><abbr title="required">*</abbr></strong> Senha: </spam>
		<input type="password" class="form-control" name="password" required />			
	</label>		
	<label class="form-group">
		<spam><strong><abbr title="required">*</abbr></strong> Confirmação de Senha: </spam>
		<input type="password" class="form-control" name="confirm_password" required />			
	</label>
	<div class="form-group">
		<input type="submit" class="btn btn-default" value="Registrar-se" />
	</div>
</form>