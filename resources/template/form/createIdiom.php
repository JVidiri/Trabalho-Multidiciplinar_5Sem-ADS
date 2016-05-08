<md-dialog>
	<md-content class="md-padding">
		<form method="post" action="caduser" enctype="multipart/form-data">
			<md-input-container class="md-block" flex-gt-xs>
        		<label>ID (disabled)</label>
        		<input name="idiomId" type="number" disabled>
        	</md-input-container>
			<md-input-container class="md-block" flex-gt-xs>
        		<label>Nome do Idioma</label>
        		<input name="idiomName">
       		</md-input-container>
       		<md-input-container class="md-block" flex-gt-xs>
        		<label>País</label>
        		<input name="countryId">
        	</md-input-container>
			<input type="submit" value="Salvar" />
        	<md-button class="md-raised md-primary" type="submit">Enviar</md-button>
        </form>
	</md-content>
</md-dialog>