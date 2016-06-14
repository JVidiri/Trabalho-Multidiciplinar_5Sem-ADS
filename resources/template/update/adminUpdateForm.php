<md-dialog>		
	<md-content class="md-padding">
		<!--<form role="form" method="post" action="/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/insert/dataFields.php" >-->
		<form role="form" ng-submit="insertNew($event)" ng-controller="AppCtrl">			
		    <md-input-container class="md-block" flex-gt-xs>
		      <label>ID</label>		      
		      <input ng-model="dataFields.admin_user_id" type="text" disabled name="id">
		    </md-input-container>
		    <md-input-container class="md-block" flex-gt-xs>
		      <label>Nome</label>		      
		      <input ng-model="dataFields.name" type="text" name="name">
		    </md-input-container>		    
			<div class="form-group">
				<md-button class="md-raised md-primary" type="submit">Enviar</md-button>
			</div>		
		</form>  	
	</md-content>		
</md-dialog>