<md-dialog>
	<md-content class="md-padding">
		<form class="form" ng-submit="insertNew($event)" ng-controller="AppCtrl">
			<md-input-container class="md-block" flex-gt-xs>
		      <label>ID</label>		      
		      <input ng-model="fields.country_id" type="text" name="name">
		    </md-input-container>
			<md-input-container class="md-block" flex-gt-xs>
		      <label>Nome do País</label>		      
		      <input ng-model="fields.name" type="text" name="name">
		    </md-input-container>
			<md-input-container class="md-block" flex-gt-xs>
        		<label>UF</label>
        		<input ng-model="fields.uf" type="text" name="country_id">
        	</md-input-container>
        	<md-input-container class="md-block" flex-gt-xs>                
                <input type="file" file-model="fields.thumb"/>
                <button type="button" ng-click="uploadFile()">upload me</button>
             </md-input-container>
			<md-button class="md-raised md-primary" type="submit">Enviar</md-button>
		</form>
	</md-content>
</md-dialog>