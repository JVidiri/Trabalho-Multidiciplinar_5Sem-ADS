<form method="post" action="caduser" enctype="multipart/form-data"> <!-- that must be secure, don't put the cad_... page in action or target! -->
	<label>
		<spam>Foto de perfil: </spam>
		<input type="file" name="fileToUpload" id="fileToUpload"><!-- how to in: http://www.w3schools.com/php/php_file_upload.asp -->
	</label>
	<label>
		<spam>Nome completo: </spam>
		<input type="text" name="complete_name" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Sobre: </spam>
		<div id="textarea" contenteditable></div> 
		<!-- make that div like: 
			http://stackoverflow.com/questions/8956567/how-do-i-make-an-editable-div-look-like-a-text-field 
		-->
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Tipo de usuário: </spam>
		<select name="user_type">			
			<option></option> <!-- must be feled with the bank. -->
		</select>
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Data de nascimento: </spam>
		<input type="date" name="birth" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Alias: </spam>
		<input type="text" name="alias" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Curriculum: </spam>
		<input type="url" name="curriculum" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<input type="submit" value="Registrar-se" />
</form>