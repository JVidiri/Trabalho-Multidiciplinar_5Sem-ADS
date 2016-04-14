<script>
(function () {
  'use strict';
  angular
      .module('selectDemoBasic', ['ngMaterial'])
      .controller('AppCtrl', function() {
        this.userState = '';
        this.states = ('AL AK AZ AR CA CO CT DE FL GA HI ID IL IN IA KS KY LA ME MD MA MI MN MS ' +
            'MO MT NE NV NH NJ NM NY NC ND OH OK OR PA RI SC SD TN TX UT VT VA WA WV WI ' +
            'WY').split(' ').map(function (state) { return { abbrev: state }; });
      });
})();
</script>

<?php //interface para executar login ?>
<div layout="column" layout-padding="" ng-cloak="" class="profileCad-container" ng-app="AkkoApp" ng-app="selectDemoBasic">
	<!-- that must be secure, don't put the cad_... page in action or target! -->
	<form method="post" action="caduser" enctype="multipart/form-data">
		<md-input-container class="md-icon-float md-block">		      
	      	<label>Foto</label>
	      	<md-icon class="name">
	      		<i class="material-icons">face</i>
	      	</md-icon>
	      	<input ng-model="profile.photo" type="file" name="profile_photo">
			<!-- how to in: https://en.gravatar.com/site/implement/profiles/json/ -->
	    </md-input-container>
	    <md-input-container class="md-icon-float md-block">		      
		    <label>Nome Completo</label>		      
		    <input ng-model="profile.complete_name" type="text" name="name" required><?php //Nome somente receberá um texto ?>		      
	    </md-input-container>
	    <md-input-container class="md-icon-float md-block">	    
		    <label>Sobre</label>		    
		    <textarea ng-model="profile.about" class="textarea" required></textarea>
	    </md-input-container>
	    <md-input-container>
        	<label>State</label>
    		<md-select ng-model="ctrl.userState">
      			<md-option ng-repeat="state in ctrl.states" value="{{state.abbrev}}" ng-disabled="$index === 1">
        			{{state.abbrev}}
      			</md-option>
    		</md-select>
  		</md-input-container>    
		<md-input-container class="md-icon-float md-block">	    
		    <label>Data de nascimento </label>
			<input ng-model="profile.birth_date" type="date" name="birth" required />			
		</md-input-container>		
		<md-input-container>
			<label>Alias </label>
			<input ng-model="profile.alias" type="text" name="alias" required />
		</md-input-container>
		<md-input-container>
			<label>Curriculum </label>
			<input ng-model="profile.curriculum" type="url" name="curriculum" required />
		</md-input-container>
		<!-- TODO Add a option to add a adress, like in https://developers.google.com/places/javascript/ search for "place autocomplete".-->			
		<!-- TODO Let the user add zero or more grades. -->
		<md-input-container>
			<label>Graduações </label>
			<md-button class="md-fab md-primary" onclick="addFields('gradesContainer', 'grade')">
				<i class="material-icons" >add</i>
			</md-button>
			<div id="gradesContainer" class="dinamicContainer"></div>
		</md-input-container>		
		<!-- TODO Let the user add zero or more experiences. -->
		<md-input-container>
			<label>Experiências </label>
			<md-button class="md-fab md-primary">
				<i class="material-icons">add</i>
			</md-button>
			<div id="experiencesContainer" class="dinamicContainer"></div>
		</md-input-container>		
		<!-- TODO Let the user add zero or more sites. -->
		<md-input-container>
			<label>Sites </label>
			<md-button class="md-fab md-primary">
				<i class="material-icons">add</i>
			</md-button>
			<div id="sitesContainer" class="dinamicContainer"></div>
		</md-input-container>		
		<!-- TODO Let the user add zero or more published works. -->
		<md-input-container>
			<label>Trabalhos publicados </label>
			<md-button class="md-fab md-primary">
				<i class="material-icons">add</i>
			</md-button>
			<div id="publishedWorkContainer" class="dinamicContainer"></div>
		</md-input-container>		
		<!-- TODO Let the user add zero or more idioms. -->
		<md-input-container>
			<label>Idiomas </label>
			<md-button class="md-fab md-primary">				
				<i class="material-icons">add</i>
			</md-button>
			<div id="idiomsContainer" class="dinamicContainer"></div>
		</md-input-container>		
		<!-- TODO Let the user add zero or more phones. -->
		<md-input-container>
			<label>Telefones </label>
			<md-button class="md-fab md-primary">
				<i class="material-icons">add</i>
			</md-button>
			<div id="phonesContainer" class="dinamicContainer"></div>
		</md-input-container>		
		<!-- TODO Let the user add zero or more aditional emails -->
		<md-input-container>
			<label>Emails </label>
			<md-button class="md-fab md-primary">
				<i class="material-icons">add</i>
			</md-button>
			<div id="emailsContainer" class="dinamicContainer"></div>
		</md-input-container>
		<md-button action="submit()">
			Salvar			
		</md-button>
	</form>
</div>