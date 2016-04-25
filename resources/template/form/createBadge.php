<md-dialog aria-label="Mango (Fruit)">
	<md-content class="md-padding">
		<form class="form" method="post" action="caduser" enctype="multipart/form-data">
			<label>
				<spam>Tipo do badge: </spam>
				<select name="badge_type">
					<option value=""></option>					
				</select>
				<strong><abbr title="required">*</abbr></strong>
			</label>
			<label>
				<spam>Título: </spam>
				<input type="text" name="title" required />
				<strong><abbr title="required">*</abbr></strong>
			</label>
			<label>
				<spam>Descrição: </spam>
				<input type="text" name="description" required />
				<strong><abbr title="required">*</abbr></strong>
			</label>
			<label>
				<spam>Thumb da badge (max 150 x 150): </spam>
				<input type="file" name="profile_photo" />
				<!-- how to in: http://www.w3schools.com/php/php_file_upload.asp -->
			</label>
			<input type="submit" value="Salvar" />
		</form>
	</md-content>
</md-dialog>