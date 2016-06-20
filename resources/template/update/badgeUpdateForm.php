<md-dialog ng-app="MyApp">
    <md-content class="md-padding" >
        <form class="form" ng-submit="insertNew($event)" ng-controller="AppCtrl">        
            <md-input-container class="md-block" flex-gt-xs>
                <label>id</label>
                <input ng-model="dataFields.badge_id" type="text" name="title">
            </md-input-container>
            <md-input-container class="md-block" flex-gt-xs>
                <label>Titulo</label>
                <input ng-model="dataFields.title" type="text" name="title">
            </md-input-container>
            <md-input-container class="md-block" flex-gt-xs>
                <label>Descrição</label>
                <input ng-model="dataFields.description" type="text" name="description">
            </md-input-container>        
            <md-select ng-model="dataFields.fk_type_id" ng-click="loadBadgeTypes($event)" class="md-block" flex-gt-xs>   
                <md-option ng-selected="badgeType.type_id==dataFields.fk_type_id" value="dataFields.fk_type_id" ng-value="badgeType.type_id" ng-repeat="badgeType in badgeTypes">
                    {{ badgeType.name }}
                </md-option>
            </md-select>
            <md-input-container class="md-block" flex-gt-xs>                
                <input type="file" file-model="dataFields.thumb"/>
                <button type="button" ng-click="uploadFile()">upload me</button>
             </md-input-container>
            <div class="form-group">
                <md-button class="md-raised md-primary" type="submit">Enviar</md-button>
            </div>
        </form>
    </md-content>
</md-dialog>