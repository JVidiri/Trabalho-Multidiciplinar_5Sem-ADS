<form method="post" action="caduser"> <!-- that must be secure, don't put the cad_... page here! -->
	<label>
		<spam>Nome: </spam>
		<input type="text" name="name" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>E-mail: </spam>
		<input type="text" name="mail" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Senha: </spam>
		<input type="text" name="password" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Confirmação de Senha: </spam>
		<input type="text" name="password_confirm" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<input type="submit" value="Registrar-se" />
</form>