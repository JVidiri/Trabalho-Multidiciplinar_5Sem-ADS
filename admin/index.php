<?php  
  require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
  require_once($rootPath . '/resources/template/sql/dbFacade.php');
  require_once($rootPath . '/resources/adminAccessControl.php');
?>
<html lang="en" ng-app="AkkoAdminApp">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/Trabalho-Multidiciplinar_5Sem-ADS/resources/style/bootstrap.min.css">
    <link rel="stylesheet" href="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/angular-material.min.css">
    <link rel="stylesheet" href="/Trabalho-Multidiciplinar_5Sem-ADS/resources/style/akko.css">
    <link rel="stylesheet" href="/Trabalho-Multidiciplinar_5Sem-ADS/resources/style/admin.css">
    <link rel="stylesheet" href="/Trabalho-Multidiciplinar_5Sem-ADS/resources/style/angular-responsive-tables.min.css">
    <script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/angular.min.js"></script>
    <script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/angular-animate.min.js"></script>
    <script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/angular-aria.min.js"></script>
    <script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/angular-material.min.js"></script>
    <script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/angular-material-icons.min.js"></script>    
    <script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/adminCommon.js"></script>    
    <script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/angular-responsive-tables.min.js"></script>
  </head>
  <div class="error">
      <p>
        <?php 
          if (isset($accessErrorMessage)){
            echo $accessErrorMessage;
            exit;
          }
        ?>
      </p>
    </div>
  <body layout="row" ng-controller="AppCtrl">    
    <md-sidenav layout="column" class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="$mdMedia('gt-md')">
      <md-toolbar class="md-tall md-hue-1">
        <span flex></span>
        <div layout="column" class="md-toolbar-tools-bottom inset">
          <span></span>
          <div layout="row" layout-align="start center">                    
              <span flex><?php echo $username; ?> </span>
              <md-button class="md-fab-small md-fab-bottom-right" aria-label="Add" ng-href="index.php?logoff=1">
                <ng-md-icon icon="exit_to_app"></ng-md-icon>
              </md-button>            
          </div>
        </div>
      </md-toolbar>
      <md-list>        
        <md-item ng-repeat="item in menu" class="optionList">
          <span ng-click="changeBehavior($event, item)">
            <md-item-content md-ink-ripple layout="row" layout-align="start center">
              <div class="inset">
                <ng-md-icon icon="{{item.icon}}"></ng-md-icon>
              </div>
              <div class="inset">{{item.title}}</div>
            </md-item-content>
          </span>
        </md-item>
      </md-list>
    </md-sidenav>
    <div layout="column" class="relative" layout-fill role="main">
      <md-button class="md-fab md-fab-bottom-right" aria-label="Add" ng-click="showAdd($event)">
        <ng-md-icon icon="add"></ng-md-icon>
      </md-button>
      <md-toolbar>
        <div class="md-toolbar-tools">
          <md-button ng-click="toggleSidenav('left')" hide-gt-md aria-label="Menu">
            <ng-md-icon icon="menu"></ng-md-icon>
          </md-button>
          <h2>
            <img src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/img/akkomin.png" style="max-width: 2%;"> Akko Admin
          </h2>
          <span flex></span>
        </div>
      </md-toolbar>
      <md-content flex>
        <ui-view layout="column" layout-padding>
          <md-content>
            <div>              
              <table wt-responsive-table class="table table-striped responsive">
                <tr>
                  <th ng-repeat="(header, value) in list[0]">
                    {{header}}
                  </th>
                  <th></th>
                  <th></th>
                </tr>
                <tr ng-repeat="row in list">
                  <td ng-repeat="cell in row" >
                    {{cell}}
                  </td>
                  <td>
                    <md-button ng-click="deleteById($event, row)" aria-label="Deletar">
                      <ng-md-icon icon="delete"></ng-md-icon>
                    </md-button>
                  </td>
                  <td>
                    <md-button ng-click="mostrarId($event, row)" aria-label="Alterar">
                      <ng-md-icon icon="settings"></ng-md-icon>
                    </md-button></td>
                </tr>
              </table>
            </div>
          </md-content>
        </ui-view>
      </md-content>
    </div>
  </body>
</html>