var app = angular.module('AkkoAdminApp', ['ngMaterial', 'ngMdIcons', 'wt.responsive']);
app.config(function($compileProvider){
  $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|file|javascript):/);
});

var addOption = '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createBadge.php';
var listedOption = '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/admin.php?lastElement=0';
var parentEl = angular.element(document.body);
var urlDelete = '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/admin.php';

app.controller('AppCtrl', ['$scope', '$http', '$mdBottomSheet','$mdSidenav', '$mdDialog', '$location', function($scope, $http,$mdBottomSheet, $mdSidenav, $mdDialog, $location){
  $scope.toggleSidenav = function(menuId) {
    $mdSidenav(menuId).toggle();          
  };
  $scope.menu = [
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/admin.php?lastElement=0',
    title: 'Usuário admin',
    icon: 'account_circle',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/adminRegister.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/admin.php'
  },
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/user.php?lastElement=0',
    title: 'Usuário comum',
    icon: 'account_circle',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/userRegister.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/user.php'
  },
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/badge.php?lastElement=0',
    title: 'Medalhas',
    icon: 'favorite',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createBadge.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/badge.php'
  },
  {
    link: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/country.php?lastElement=0',
    title: 'País',
    icon: 'room',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createCountry.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/country.php'
  },
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/governmentDistrict.php?lastElement=0',
    title: 'Distrito governamental',
    icon: 'room',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createGovernmentDistrict.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/governmentDistrict.php'
  },
  {
    link: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/city.php?lastElement=0',
    title: 'Cidade',
    icon: 'room',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createCity.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/city.php'
  },
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/grade.php?lastElement=0',
    title: 'Grau de escolaridade',
    icon: 'assignment',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createGrade.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/grade.php'
  },
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/idiom.php?lastElement=0',
    title: 'Idioma',
    icon: 'assignment',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createIdiom.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/idiom.php'
  },
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/idiomLevel.php?lastElement=0',
    title: 'Niveis de idioma',
    icon: 'assignment',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createIdiomLevel.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/idiomLevel.php'
  },
  {
    link : '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/profileType.php?lastElement=0',
    title: 'Tipos de perfil',
    icon: 'assignment',
    urlCreateTemplate: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/form/createProfileType.php',
    urlDelete: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/delete/profileType.php'
  }
  ];

  $scope.list = [];
  $scope.loadJson = function(ev) {
    $http.get(listedOption)
    .then(function(res){
      $scope.list = res.data;
      console.log(res.data);
    });
  }

  $scope.mostrarId = function(ev, row){
    console.log(row[Object.keys(row)[0]]);
  }

  $scope.deleteById = function(ev, row){    
    var data = {};
    data[Object.keys(row)[0]] = row[Object.keys(row)[0]];                    
    $http.post(urlDelete, data)
    .success(function (data, status, headers, config) {
      $scope.PostDataResponse = data;
      $scope.loadJson();
    });
  }

  $scope.logOff = function() {
      $location.url("http://localhost/Trabalho-Multidiciplinar_5Sem-ADS/admin/index.php?logoff=1");
  };

  $scope.showAdd = function(ev) {
    $mdDialog.show({
      controller: DialogController,
      templateUrl: addOption,
      parent: parentEl,
      targetEvent: ev
    })
    .then(function(answer) {
      $scope.alert = '';
    }, function() {
      $scope.alert = '';
    });
  };

  $scope.changeContentAndButtonEffect = function(ev, urlForForm, urlForList, urlForDelete){
    addOption = urlForForm;
    listedOption = urlForList;
    urlDelete = urlForDelete;
    $scope.loadJson();          
  };
}]);

app.controller('ListBottomSheetCtrl', function($scope, $mdBottomSheet) {
  $scope.items = [
  { name: 'Share', icon: 'share' },
  { name: 'Upload', icon: 'upload' },
  { name: 'Copy', icon: 'copy' },
  { name: 'Print this page', icon: 'print' },
  ];

  $scope.listItemClick = function($index) {
    var clickedItem = $scope.items[$index];
    $mdBottomSheet.hide(clickedItem);
  };
});    

function DialogController($scope, $mdDialog) {
  $scope.hide = function() {
    $mdDialog.hide();
  };
  $scope.cancel = function() {
    $mdDialog.cancel();
  };
  $scope.answer = function(answer) {
    $mdDialog.hide(answer);
  };
};

app.config(
  function($mdThemingProvider) {
    $mdThemingProvider.definePalette(
      'AkkoPrimary', {
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
      }
      );
    $mdThemingProvider.definePalette(
      'AkkoAcent', {
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
      }
      );
    $mdThemingProvider.definePalette(
      'AkkoWarn', {
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
      }
      );
    $mdThemingProvider.definePalette(
      'AkkoBackground', {
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
      }
      );
    $mdThemingProvider.theme('AkkoTheme')
    .primaryPalette('AkkoPrimary')
    .accentPalette('AkkoAcent')
    .warnPalette('AkkoWarn')
    .backgroundPalette('AkkoBackground');
    /* Making Akko theme the default for load in the entire application */
    $mdThemingProvider.setDefaultTheme('AkkoTheme');
  }
  );