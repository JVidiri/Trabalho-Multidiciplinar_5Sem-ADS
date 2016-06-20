<div layout="column" class="register-container" ng-app="AkkoApp">
  <md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding>
    <form class="form" ng-submit="insertNewProfile($event)" ng-controller="AppCtrl">
      <h3>
        <div flex="33">
          <md-icon class="formIcon">
            <i class="material-icons">perm_contact_calendar
            </i>
          </md-icon>
          Cadastro de perfil          
        </div>
      </h3>
      <div layout-gt-xs="row">        
        <div class="button" ngf-select ng-model="fields.photo_path" name="file" ngf-pattern="'image/*'"
			    ngf-accept="'image/*'" ng-click="uploadFiles" ngf-max-size="20MB" ngf-min-height="100" >
			    <md-button class="md-fab" type="button" style="width: 105px; height: 105px;">                
          	<i class="material-icons" style="font-size: 96px">face
          	</i>        	
        	</md-button>
       	</div>        
        <md-input-container flex> 
          <label>Nome Completo
          </label>                     
          <input ng-model="fields.complete_name">
        </md-input-container>                       
      </div>
      <div layout-gt-sm="row">              
        <mdp-date-picker mdp-placeholder="Data de nascimento" ng-model="fields.birth"></mdp-date-picker>
        <md-input-container flex>         
	        <label>Tipo de perfil</label>
	        <md-select ng-model="fields.fk_type_id" class="md-block" flex-gt-xs>           	
	          <md-option ng-value="profileType.type_id"  ng-repeat="profileType in profileTypes">
	            {{ profileType.name }}
	          </md-option>
	        </md-select>
	      </md-input-container>
      </div>
      <div layout-gt-sm="row">
        <md-input-container flex> 
          <label>Alias
          </label> 
          <input ng-model="fields.alias"> 
        </md-input-container>
      </div>
      <div layout-gt-sm="row">
        <md-input-container flex> 
          <label>Curriculum
          </label> 
          <input ng-model="fields.curriculum"> 
        </md-input-container>
      </div>
      <div layout-gt-sm="row">
	      <md-input-container flex> 
	        <label>Sobre
	        </label> 
	        <textarea ng-model="fields.about" columns="1" md-maxlength="500">
	        </textarea> 
	      </md-input-container>         
    	</div>
	    <div class="form-group">
	      <md-button class="md-raised md-primary" type="submit">Salvar</md-button>
	    </div>
    </form>
  </md-content>    
</div>
