<form method="post" action="caduser" enctype="multipart/form-data">	
	<label>
		<spam>Título: </spam>
		<input type="text" name="title" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Pontuação: </spam>
		<input type="number" name="ponctuation" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Pontuação: </spam>
		<input type="number" name="ponctuation" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Pais: </spam>
		<select name="country">
		<?php foreach($dbh->query('select `country_id`, `name`  from `country`') as $line){ ?>
			<option value="<?php echo $line['country_id']; ?>"><?php echo $line['name']; ?></option>
		<?php } ?>
		</select>
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<input type="submit" value="Salvar" />
</form>