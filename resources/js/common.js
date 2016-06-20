/*
	Ajax function to load a new content into a div, was for tests only, made a new if necessary.
*/
function clientSideRequest(id, url) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById(id).innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", url, true); // send it ALWAYS with a async request.
    xhttp.send();
}

/*
	  Creates new fields in the container with name equals a member_x where x 
	  fis a the last input number +1
*/
function addFields(container, member) {
    // Container <div> where dynamic content will be placed
    var container = document.getElementById(container);
    var lastAdd = container.lastChild;
    var i = 1;
    if (lastAdd != null) {
        i = parseInt(lastAdd.getAttribute("name").split('_')[1]) + 1;
    }
    // Create an <input> element, set its type and name attributes
    var input = document.createElement("md-input");
    input.name = member + "_" + i;
    container.appendChild(input);

}

/* Angular Declaring the Akko Angular module and it's dependences. */
var AkkoApp = angular.module('AkkoApp', ['ngMaterial', 'ngMessages', 'ngAria', 'ngAria', 'ngFileUpload', 'mdPickers']);
/* Angular material theme config for the colors of akko created in: http://mcg.mbitson.com/#/ (Re-idented)*/
AkkoApp.config(
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

AkkoApp.controller('AppCtrl', ['$scope', '$http', 'Upload', '$timeout', '$mdpDatePicker',
    function($scope, $http, Upload, $timeout, $mdpDatePicker) {      
		$scope.profileTypes = [];		

    	$scope.loadProfileTypes = function() {    		
		    $http.get('/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/profileType.php?lastElement=0').then(function(res){      		    	
        		$scope.profileTypes = res.data;
    		});
    	};
    	$scope.loadProfileTypes();

        $scope.uploadFiles = function(file) {
            $scope.f = file;
            if (file) {
                file.upload = Upload.upload({
                    url: '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/insert/uploadFiles.php',
                    data: {
                        file: file
                    }
                });

                file.upload.then(function(response) {
                    $timeout(function() {
                        file.result = response.data;                        
                    });
                }, function(response) {
                    if (response.status > 0)
                        $scope.errorMsg = response.status + ': ' + response.data;
                }, function(evt) {
                    file.progress = Math.min(100, parseInt(100.0 *
                        evt.loaded / evt.total));
                });
            }            
        }

        $scope.insertNewProfile = function(ev) {
            var data = $scope.fields;			
            $scope.uploadFiles($scope.fields.photo_path);
            $scope.fields.photo_path = $scope.fields.photo_path.name;            
            $http.post('/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/insert/profile.php', data)
                .success(function(data, status, headers, config) {
                    $scope.PostDataResponse = data;
                })
                .error(function(data, status, headers, config) {
                    alert('Errrooou!');
                });                       
        };
    }
]);