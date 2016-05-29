<md-dialog>
	<md-content class="md-padding" >
	       <form class="form" ng-submit="insertNew($event)" ng-controller="AppCtrl">
        		<md-input-container class="md-block" flex-gt-xs>
        			<label>ID (disabled)</label>
        			<input name="badge_id" type="number" disabled>
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