<div layout="column" layout-padding="" ng-cloak="" class="login-container" ng-app="AkkoApp">
	<md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding>
		<h3>Registre-se</h3>
		<form role="form" method="post" action="<?php echo $submitAction ?>">
			<md-input-container class="md-icon-float md-block">
				<label>
				 	Nome
				</label>			
				<md-icon class="name">
		      		<i class="material-icons">perm_identity</i>
		      	</md-icon>		      	
				<input ng-model="newuser.name" type="text" name="name"/>
			</md-input-container>				
			<md-input-container class="md-icon-float md-block">
				<label>
					 @Mail
				</label>	
				<md-icon class="mail">
		      		<i class="material-icons">mail_outline</i>
		      	</md-icon>
				<input ng-model="newuser.mail" type="email" name="mail"/>
			</md-input-container>
			<md-input-container class="md-icon-float md-block">
				<label>
					Senha
				</label>
				<md-icon class="pass">
		      		<i class="material-icons">vpn_key</i>
		      	</md-icon>						
				<input ng-model="newuser.password" type="password" name="password"/>
			</md-input-container>
			<md-input-container class="md-icon-float md-block">
				<label>
					Confirmação de Senha
				</label>
				<md-icon class="passConf">
		      		<i class="material-icons">vpn_key</i>
		      	</md-icon>				
				<input ng-model="newuser.confirm_password" type="password" name="confirm_password"/>
			</md-input-container>
			<div class="form-group">				
				<md-button class="md-raised md-accent" type="submit">Registrar-se</md-button>
			</div>
		</form>
	</md-content>
</div>