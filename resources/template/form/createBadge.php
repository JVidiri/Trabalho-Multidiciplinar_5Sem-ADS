<md-dialog>
    <md-content class="md-padding" >
    <form class="form" ng-submit="insertNew($event)" ng-controller="AppCtrl">        
        <md-input-container class="md-block" flex-gt-xs>
            <label>Titulo</label>
            <input name="badgeTitle">
        </md-input-container>
        <md-input-container class="md-block" flex-gt-xs>
            <label>Descrição</label>
            <input name="badgeDescription">
        </md-input-container>
        <div ng-controller="badgeTypeLoader">
            <md-select ng-model="selectedBadgeType" ng-model-options="{trackBy: '$value.id'}" class="md-block" flex-gt-xs>
                <md-option ng-value="badgeType" ng-repeat="badgeType in badgeTypes">{{ badgeType.name }}</md-option>
            </md-select>
        </div>
        <md-button class="md-raised md-primary" type="submit">Enviar</md-button>
    </form>
    </md-content>
</md-dialog>