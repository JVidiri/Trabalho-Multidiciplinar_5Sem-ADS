<?php //interface para executar login ?>
<md-dialog>
	<md-content class="md-padding">
		<div layout="column" layout-padding="" ng-cloak="" class="login-container" ng-app="AkkoApp">
			<md-content class="md-no-momentum " layout-padding>				
				<form role="form" method="post" action="/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/insert/admin.php" >
					<?php //utilização do metodo post para envio de dados, O submitAction vem do arquivo que inclui este form. ?>
				    <md-input-container class="md-icon-float md-block">		      
				      <label>
				      	<md-icon class="name">
				      		<i class="material-icons">face</i>
				      	</md-icon>
				      	Nome
				      </label>		      
				      <input ng-model="user.name" type="text" name="name"><?php //Nome somente receberá um texto ?>
				    </md-input-container>
				    <md-input-container class="md-icon-float md-block">			      
				    	<label>
				    		<md-icon class="name">
				      			<i class="material-icons">vpn_key</i>
				      		</md-icon>
				      		Senha
				      	</label>				      	
				      	<?php //Password do usuário, não deve ser um campo de texto normal. ?>
				      	<input ng-model="user.password" type="password" name="password">
				    </md-input-container>
				    <md-input-container class="md-icon-float md-block">			      
				    	<label>
				    		<md-icon class="name">
				      			<i class="material-icons">vpn_key</i>
				      		</md-icon>
				      		Confirmação de senha
				      	</label>				      	
				      	<?php //Password do usuário, não deve ser um campo de texto normal. ?>
				      	<input ng-model="user.password_conf" type="password" name="password_conf">
				    </md-input-container>
					<div class="form-group">
						<md-button type="submit">Salvar</md-button>
					</div>		
				</form>  	
			</md-content>
		</div>
	</md-dialog>
</md-content>