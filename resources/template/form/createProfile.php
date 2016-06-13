<div layout="column" layout-padding="" ng-cloak="" class="register-container" ng-app="AkkoApp">
   <md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding ng-controller="AppCtrl">
      <form name="profileForm">
         <h3>
            <div flex="33">
               <md-icon class="formIcon">
                  <i class="material-icons">perm_contact_calendar</i>
               </md-icon>
               Cadastro de perfil          
            </div>
         </h3>         
         <div layout layout-sm="column">                        
            <md-button class="md-fab" style="width: 105px; height: 105px;">
                <i class="material-icons" style="font-size: 96px">face</i>                
            </md-button>
            <input id="file_input_file" class="none" type="file" ng-hide="true"/>
            <div layout flex layout-sm="column">            
                <md-input-container flex> 
                    <label>Primeiro nome</label> 
                    <input ng-model="profile.firstName">
                </md-input-container>
                <md-input-container flex> 
                    <label>Sobrenome</label> 
                    <input ng-model="profile.lastName"> 
                </md-input-container>
            </div>
         </div>
         <md-input-container flex> 
            <label>Alias</label> 
            <input ng-model="theMax"> 
         </md-input-container>
         <md-input-container flex> 
            <label>Curriculum</label> 
            <input ng-model="theMax"> 
         </md-input-container>
         <md-input-container flex> 
            <label>Sobre</label> 
            <textarea ng-model="profile.about" columns="1" md-maxlength="500"></textarea> 
         </md-input-container>
         <md-input-container flex> 
            <label>Sobre</label> 
            <textarea ng-model="profile.biography" columns="1" md-maxlength="500"></textarea> 
         </md-input-container>
      </form>
      <div class="form-group">
         <md-button class="md-raised md-accent" type="submit">Salvar</md-button>
      </div>
   </md-content>
</div>