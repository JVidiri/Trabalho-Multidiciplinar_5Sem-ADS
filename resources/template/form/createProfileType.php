<md-dialog>
	<md-content class="md-padding">
		<form method="post" action="cadProfileType" enctype="multipart/form-data">
	
			<md-input-container class="md-block" flex-gt-xs>
	        	<label>ID (disabled)</label>
	        	<input name="typeID" type="number" disabled>
	        </md-input-container>
	        <md-input-container class="md-block" flex-gt-xs>
	        	<label>Nome</label>
	        	<input name="typeName">
	        </md-input-container>
	        <md-input-container class="md-block" flex-gt-xs>
	        	<label>Descrição</label>
	        	<input name="typeDescription">
	        </md-input-container>


	        <md-button class="md-raised md-primary" type="submit">Enviar</md-button>
		</form>
	</md-content>
</md-dialog>