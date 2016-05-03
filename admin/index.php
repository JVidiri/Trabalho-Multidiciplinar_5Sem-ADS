<?php	
	require_once('head.php');
	require_once($rootPath . '/resources/template/sql/dbFacade.php');
	require_once($rootPath . '/resources/adminAccessControl.php');
?>	
<body>
	 <body layout="row" ng-controller="AppCtrl">
    <md-sidenav layout="column" class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="$mdMedia('gt-md')">
      <md-toolbar class="md-tall md-hue-2">
        <span flex></span>
        <div layout="column" class="md-toolbar-tools-bottom inset">
          <span></span>
          <div>USER</div>
        </div>
      </md-toolbar>
      <md-list>
        <md-subheader>Administração</md-subheader>
        <md-item ng-repeat="item in menu" class="optionList">

          <a href="javascript:clientSideRequest('content', '{{item.link}}');" target="#content" ng-click="changeAddOption($event, item.urlCreateTemplate)">
            <md-item-content md-ink-ripple layout="row" layout-align="start center">
              <div class="inset">
                <ng-md-icon icon="{{item.icon}}"></ng-md-icon>
              </div>
              <div class="inset">{{item.title}}</div>
            </md-item-content>
          </a>
        </md-item>
      </md-list>
    </md-sidenav>
    <div layout="column" class="relative" layout-fill role="main">


      <md-button class="md-fab md-fab-bottom-right" aria-label="Add" ng-click="showAdd($event)">
        <ng-md-icon icon="add"></ng-md-icon>
      </md-button>



      <md-toolbar ng-show="!showSearch">
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
      <md-content flex md-scroll-y>
        <ui-view layout="column" layout-fill layout-padding>
          <md-content id="content">
          </md-content>
        </ui-view>
      </md-content>
    </div>
  </body>
</html>