<form method="post" action="caduser" enctype="multipart/form-data">
	<label>
		<spam>Thumb do pais (max 150 x 150): </spam>
		<input type="file" name="profile_photo" />
		<!-- how to in: http://www.w3schools.com/php/php_file_upload.asp -->
	</label>
	<label>
		<spam>Nome do país: </spam>
		<input type="text" name="complete_name" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>UF do pais: </spam>
		<input type="text" name="complete_name" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Código de area do país: </spam>
		<input type="number" name="complete_name" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<input type="submit" value="Salvar" />
</form>