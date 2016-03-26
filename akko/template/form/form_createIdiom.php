<form method="post" action="caduser" enctype="multipart/form-data">
	<label>
		<spam>Nome do idioma: </spam>
		<input type="text" name="UF" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Pais: </spam>
		<select name="user_type">
		<?php foreach($dbh->query('select `country_id`, `name`  from `country`') as $line){ ?>
			<option value="<?php echo $line['country_id']; ?>"><?php echo $line['name']; ?></option>
		<?php } ?>
		</select>
		<strong><abbr title="required">*</abbr></strong>
	</label>	
	<input type="submit" value="Salvar" />
</form>