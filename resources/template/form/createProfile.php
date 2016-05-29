<!--
<div layout="column" layout-padding="" ng-cloak="" class="login-container" ng-app="AkkoApp">
  <md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding>
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
        <md-input-container flex> 
          <label>Primeiro nome</label> 
          <input ng-model="profile.firstName">
        </md-input-container>
        <md-input-container flex> 
          <label>Sobrenome</label> 
          <input ng-model="theMax"> 
        </md-input-container>
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
-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
<script>
(function () {
    'use strict';
    var app = angular.module('ba3-angularmaterial-googlemaps-location', ['ngMessages', 'ngMaterial']);
    app.config(iconConfiguration);
    app.controller('PrincipalController', ['$scope', '$mdToast', PrincipalController]);

    function iconConfiguration($mdIconProvider) {
        $mdIconProvider.defaultIconSet('icons_24x24.svg', 24);
    }

    function PrincipalController($scope, $mdToast) {
        var mapa;
        var geocoder;

        $scope.view = {
            addressInput: '',
            places: [],
            selectedPlace: '',
            markers: [],
        };
        $scope.buscarDireccion = buscarDireccion;
        $scope.centrarUbicacion = centrarUbicacion;
        $scope.borrarMarcadores = borrarMarcadores;

        InitializeComponents();

        //Inicializa el mapa y otros componentes
        function InitializeComponents() {
            mapa = new google.maps.Map(document.getElementById('map'), mapConfig);
            geocoder = new google.maps.Geocoder();
            var mapConfig = {
                center: { lat: 13.676445, lng: -89.281736 },
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.HYBRID
            };
        }

        //Busca diferentes ubicaciones segun la direccion dada
        function buscarDireccion() {
            if (geocoder !== undefined) {
                geocoder.geocode(
                    { address: $scope.view.addressInput },
                    function (results, status) {
                        $scope.view.places = [];
                        $scope.view.selectedPlace = '';
                        switch (status) {
                            case google.maps.GeocoderStatus.OK:
                                console.log(results);
                                $scope.view.places = results;
                                if (results.length < 2) {
                                    $scope.view.selectedPlace = results[0].place_id;
                                    $scope.view.addressInput = results[0].formatted_address;
                                    centrarUbicacion();
                                } else mostrarMensaje('Se han encontrado ' + $scope.view.places.length + ' ubicaciones');
                                break;
                            case google.maps.GeocoderStatus.ZERO_RESULTS:
                                mostrarMensaje('No se han encontrado resultados');
                                break;
                            case google.maps.GeocoderStatus.REQUEST_DENIED:
                                mostrarMensaje('La solicitud de búsqueda ha sido denegada');
                                break;
                            case google.maps.GeocoderStatus.INVALID_REQUEST:
                                mostrarMensaje('Solicitud inválida');
                                break;
                        }
                        $scope.$apply();
                    }
                );
            }
        }

        //Posiciona en el centro de la vista del mapa la ubicacion seleccionada
        function centrarUbicacion() {
            if ($scope.view.selectedPlace !== undefined & $scope.view.selectedPlace !== '') {
                var location = _.result(_.find($scope.view.places, function (x) { return x.place_id === $scope.view.selectedPlace; }), 'geometry.location');
                if (location !== undefined) {
                    var marker = new google.maps.Marker({ position: location, map: mapa });
                    $scope.view.markers.push(marker);
                    mapa.setCenter(location);
                }
                else {
                    mostrarMensaje('No se pudo mostrar la ubicación');
                }
            }
        }

        //Borra los marcadores del mapa
        function borrarMarcadores() {
            for (var i = 0; i < $scope.view.markers.length; i++) {
                $scope.view.markers[i].setMap(null);
            }
            $scope.view.markers = [];
        }

        //Muestra un mensaje toast (funcion base)
        function simpleToastBase(message, position, delay, action) {
            $mdToast.show(
                $mdToast.simple()
                    .content(message)
                    .position(position)
                    .hideDelay(delay)
                    .action(action)
            );
        }

        //Muestra un mensaje toast
        function mostrarMensaje(mensaje) {
            simpleToastBase(mensaje, 'top right', 6000, 'X');
        }
    }
})();
</script>
<span ng-app="ba3-angularmaterial-googlemaps-location">
    <md-toolbar>
        <div class="md-toolbar-tools">
            <h3><span>Angular Material & Google Maps Location Service</span></h3>
        </div>
    </md-toolbar>
    <md-content layout-padding ng-controller="PrincipalController">
        <md-input-container>
            <label>Dirección</label>
            <input ng-model="view.addressInput" ng-model-options="{debounce: 1000}" ng-change="buscarDireccion()" />
        </md-input-container>
        <div layout="row">
            <md-input-container flex="99">
                <label>Ubicaciones disponibles</label>
                <md-select ng-model="view.selectedPlace" ng-disabled="view.places.length < 2" ng-change="centrarUbicacion()">
                    <md-option ng-repeat="place in view.places" value="{{place.place_id}}">{{place.formatted_address}}</md-option>
                </md-select>
            </md-input-container>
            <md-button class="md-icon-button" ng-click="borrarMarcadores()" ng-disabled="view.markers.length === 0">
                <md-icon md-svg-icon="white_delete" aria-label="Borrar"></md-icon>
                <md-tooltip md-delay="1500" md-autohide="true">Borrar</md-tooltip>
            </md-button>
        </div>
    </md-content>
    <div id="map" class="altura-mapa"></div>
    <script type="text/ng-template" id="icons_24x24.svg">
        <svg 
             width="24"
             height="24" 
             viewBox="0 0 24 24" 
             xmlns="http://www.w3.org/2000/svg">
            <g id="white_delete">
                <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                <path d="M0 0h24v24H0z" fill="none" />
            </g>
        </svg>
    </script>
</span>