<md-dialog>		
	<md-content class="md-padding">
		<!--<form role="form" method="post" action="/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/insert/admin.php" >-->
		<form role="form" ng-submit="insertNew()" ng-controller="AppCtrl">			
		    <md-input-container class="md-block" flex-gt-xs>
		      <label>Nome</label>		      
		      <input ng-model="fields.name" type="text" name="name">
		    </md-input-container>
		    <md-input-container class="md-block" flex-gt-xs>
		    	<label>Senha</label>		      	
		      	<input ng-model="fields.password" type="password" name="password">
		    </md-input-container>
		    <md-input-container class="md-block" flex-gt-xs>
		    	<label>Confirmação de senha</label>		      	
		      	<input ng-model="fields.password_conf" type="password" name="password_conf">
		    </md-input-container>
			<div class="form-group">
				<md-button class="md-raised md-primary" type="submit">Enviar</md-button>
			</div>		
		</form>  	
	</md-content>		
</md-dialog>