<md-dialog>
	<md-content class="md-padding">
	       <form class="form" method="post" action="caduser" enctype="multipart/form-data">
        		<md-input-container class="md-block" flex-gt-xs>
        			<label>ID (disabled)</label>
        			<input name="badgeId" type="number" disabled>
        		</md-input-container>
        		<md-input-container class="md-block" flex-gt-xs>
        			<label>Titulo</label>
        			<input name="badgeTitle">
        		</md-input-container>
        		<md-input-container class="md-block" flex-gt-xs>
        			<label>Descrição</label>
        			<input name="badgeDescription">
        		</md-input-container>

                        <md-button class="md-raised md-primary" type="submit">Enviar</md-button>
	       </form>
	</md-content>
</md-dialog>