<md-dialog>
	<md-content class="md-padding">
		<form method="post" action="caduser" enctype="multipart/form-data">	
			<md-input-container class="md-block" flex-gt-xs>
        		<label>ID (disabled)</label>
        		<input name="gradeId" type="number" disabled>
       		</md-input-container>
			<md-input-container class="md-block" flex-gt-xs>
        		<label>Título</label>
        		<input name="gradeTitle">
       		</md-input-container>
			<md-input-container class="md-block" flex-gt-xs>
        		<label>Pontuação</label>
        		<input name="gradeScore" type="number" min="1">
       		</md-input-container>
			<md-input-container class="md-block" flex-gt-xs>
        		<label>País</label>
        		<input name="gradeCountry">
       		</md-input-container>
			<md-button class="md-raised md-primary" type="submit">Enviar</md-button>
		</form>
	</md-content>
</md-dialog>