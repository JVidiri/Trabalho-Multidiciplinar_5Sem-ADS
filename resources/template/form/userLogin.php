<div layout="column" layout-padding="" ng-cloak="" class="login-container" ng-app="AkkoApp">
	<md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding>
		<h3>Login</h3>
		<form role="form" method="post" action="<?php echo $submitAction ?>" >
			<?php //utilização do metodo post para envio de dados, O submitAction vem do arquivo que inclui este form. ?>
		    <md-input-container class="md-icon-float md-block">		      		      
		      	<label>		      		
		      		@ Email	
		      	</label>
		    	<md-icon class="mail">
		      		<i class="material-icons">mail_outline</i>
		      	</md-icon>
	      		<input ng-model="user.mail" type="email" name="mail"><?php //Nome somente receberá um texto ?>		      		      
		    </md-input-container>
		    <md-input-container class="md-icon-float md-block">			      		      
		      	<label>		      		
		      		& Senha
		    	</label>
		    	<md-icon class="name">
	      			<i class="material-icons">vpn_key</i>
	      		</md-icon>
		    	<input ng-model="user.password" type="password" name="password"><?php //Password do usuário, não deve ser um campo de texto normal. ?>
		    </md-input-container>
			<div class="form-group">
				<md-button class="md-raised md-accent" type="submit">Entrar</md-button>
			</div>
		</form>  	
	</md-content>
</div>