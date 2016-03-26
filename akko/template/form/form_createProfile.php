<!-- that must be secure, don't put the cad_... page in action or target! -->
<form method="post" action="caduser" enctype="multipart/form-data">
	<label>
		<spam>Foto de perfil: </spam>
		<input type="file" name="profile_photo" />
		<!-- how to in: http://www.w3schools.com/php/php_file_upload.asp -->
	</label>
	<label>
		<spam>Nome completo: </spam>
		<input type="text" name="complete_name" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Sobre: </spam>
		<div class="textarea" contenteditable></div> 		
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Tipo de usuário: </spam>
		<select name="user_type">
			<?php foreach($dbh->query('select `type_id`, `name`  from `profile_type`') as $line){ ?>
			<option value="<?php echo $line['type_id']; ?>"><?php echo $line['name']; ?></option>			
			<?php } ?>
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
	<!-- TODO Add a option to add a adress, like in https://developers.google.com/places/javascript/ search for "place autocomplete".-->
	<!-- TODO Let the user add zero or more grades. -->
	<!-- TODO Let the user add zero or more experiences. -->
	<!-- TODO Let the user add zero or more sites. -->
	<!-- TODO Let the user add zero or more published works. -->
	<!-- TODO Let the user add zero or more idioms. -->
	<!-- TODO Let the user add zero or more phones. -->
	<!-- TODO Let the user add zero or more aditional emails -->
	<input type="submit" value="Salvar" />
</form>