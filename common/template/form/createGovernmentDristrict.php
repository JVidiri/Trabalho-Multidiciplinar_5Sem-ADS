<form method="post" action="caduser" enctype="multipart/form-data">	
	<label>
		<spam>Nome do estado: </spam>
		<input type="text" name="complete_name" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>UF do estado: </spam>
		<input type="text" name="UF" required />
		<strong><abbr title="required">*</abbr></strong>
	</label>
	<label>
		<spam>Pais: </spam>
		<?php foreach($dbh->query('select `country_id`, `name`  from `country`') as $line){ ?>
			<option value="<?php echo $line['country_id']; ?>"><?php echo $line['name']; ?></option>
		<?php } ?>
		<strong><abbr title="required">*</abbr></strong>
	</label>	
	<input type="submit" value="Salvar" />
</form>