<script type="text/javascript">
angular
  .module('LoginApp',['ngMaterial', 'ngMessages', 'ngMdIcons'])
  .controller('LoginCtrl', function($scope) {
    $scope.user = {
      name: '',
      email: '',
      phone: '',

    };
  })
  .config(function($mdThemingProvider) {
  	$mdThemingProvider.definePalette('AkkoPrimary', {
	  '50': '#ffffff',
	  '100': '#ffecb3',
	  '200': '#ffde7b',
	  '300': '#ffcc33',
	  '400': '#ffc515',
	  '500': '#f5b800',
	  '600': '#d6a100',
	  '700': '#b88a00',
	  '800': '#997300',
	  '900': '#7b5c00',
	  'A100': '#ffffff',
	  'A200': '#ffecb3',
	  'A400': '#ffc515',
	  'A700': '#b88a00',
	  'contrastDefaultColor': 'dark',
	  'contrastDarkColors': '50 100 200 300 400 500 600 700 A100 A200 A400 A700'
	});
	$mdThemingProvider.definePalette('AkkoAcent', {
	  '50': '#a8cde9',
	  '100': '#6aa9da',
	  '200': '#3e8fcf',
	  '300': '#276a9e',
	  '400': '#215985',
	  '500': '#1b496d',
	  '600': '#153954',
	  '700': '#0f283c',
	  '800': '#091823',
	  '900': '#03070b',
	  'A100': '#a8cde9',
	  'A200': '#6aa9da',
	  'A400': '#215985',
	  'A700': '#0f283c',
	  'contrastDefaultColor': 'light',
	  'contrastDarkColors': '50 100 A100 A200'
	});
	$mdThemingProvider.definePalette('AkkoWarn', {
	  '50': '#ffffff',
	  '100': '#ffd0b3',
	  '200': '#ffad7b',
	  '300': '#ff8133',
	  '400': '#ff6f15',
	  '500': '#f55e00',
	  '600': '#d65200',
	  '700': '#b84700',
	  '800': '#993b00',
	  '900': '#7b2f00',
	  'A100': '#ffffff',
	  'A200': '#ffd0b3',
	  'A400': '#ff6f15',
	  'A700': '#b84700',
	  'contrastDefaultColor': 'light',
	  'contrastDarkColors': '50 100 200 300 400 500 A100 A200 A400'
	});
	$mdThemingProvider.definePalette('AkkoBackground', {
	  '50': '#ebebeb',
	  '100': '#c4c4c4',
	  '200': '#a8a8a8',
	  '300': '#858585',
	  '400': '#757575',
	  '500': '#666666',
	  '600': '#575757',
	  '700': '#474747',
	  '800': '#383838',
	  '900': '#292929',
	  'A100': '#ebebeb',
	  'A200': '#c4c4c4',
	  'A400': '#757575',
	  'A700': '#474747',
	  'contrastDefaultColor': 'light',
	  'contrastDarkColors': '50 100 200 300 A100 A200'
	});
	$mdThemingProvider.theme('AkkoTheme')
		.primaryPalette('AkkoPrimary')
		.accentPalette('AkkoAcent')
		.warnPalette('AkkoWarn')
		.backgroundPalette('AkkoBackground');
	$mdThemingProvider.setDefaultTheme('AkkoTheme');
  });
</script>
<div ng-controller="LoginCtrl" layout="column" layout-padding="" ng-cloak="" class="login-container" ng-app="LoginApp">
	<md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding>
		<h3>Login</h3>
		<form role="form" method="post" action="<?php echo $submitAction ?>" >
		    <md-input-container class="md-icon-float md-block">		      
		      <label>Nome</label>
		      <md-icon class="name">
		      	<ng-md-icon icon="person" size="24px"></ng-md-icon>
		      </md-icon>
		      <input ng-model="user.name" type="text" name="name">
		    </md-input-container>    

		    <md-input-container class="md-icon-float md-block">			      
		      <label>Senha</label>
		      <md-icon class="name">
		      	<ng-md-icon icon="vpn_key" size="24px"></ng-md-icon>
		      </md-icon>
		      <input ng-model="user.password" type="password" name="password">
		    </md-input-container>
			<div class="form-group">
				<md-button class="md-raised md-accent" type="submit">Entrar</md-button>
			</div>		
		</form>  	
	</md-content>
</div>