<div layout="column" layout-padding="" ng-cloak="" class="login-container" ng-app="AkkoApp">
	<md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding>
		<h3>Login</h3>
		<form role="form" method="post" action="<?php echo $submitAction ?>" >
		    <md-input-container class="md-icon-float md-block">		      
		      <label>Nome</label>
		      <md-icon class="name">
		      	<i class="material-icons">face</i>
		      </md-icon>
		      <input ng-model="user.name" type="text" name="name">
		    </md-input-container>    

		    <md-input-container class="md-icon-float md-block">			      
		      <label>Senha</label>
		      <md-icon class="name">
		      	<i class="material-icons">vpn_key</i>
		      </md-icon>
		      <input ng-model="user.password" type="password" name="password">
		    </md-input-container>
			<div class="form-group">
				<md-button class="md-raised md-accent" type="submit">Entrar</md-button>
			</div>		
		</form>  	
	</md-content>
</div>