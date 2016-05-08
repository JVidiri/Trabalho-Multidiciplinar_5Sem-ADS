<md-dialog>
	<md-content class="md-padding">
		<form method="post" action="caduser" enctype="multipart/form-data">
			<md-input-container class="md-block" flex-gt-xs>
        		<label>ID (disabled)</label>
        		<input name="countryId" type="number" disabled>
        	</md-input-container>
			<label>
				<spam>Thumb do pais (max 150 x 150): </spam>
				<input type="file" name="profile_photo" />
				<!-- how to in: http://www.w3schools.com/php/php_file_upload.asp -->
			</label>
			<md-input-container class="md-block" flex-gt-xs>
        		<label>Nome do País</label>
        		<input name="countryId">
        	</md-input-container>
			<md-input-container class="md-block" flex-gt-xs>
        		<label>UF</label>
        		<input name="countryId">
        	</md-input-container>

			<md-button class="md-raised md-primary" type="submit">Enviar</md-button>
		</form>
	</md-content>
</md-dialog>