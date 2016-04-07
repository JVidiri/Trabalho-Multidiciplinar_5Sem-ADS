<?php   
    require_once('head.php');
?>
<body>
    <div ng-app="adminList">
        <div ng-controller="adminCtrl">    
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
                <tr ng-repeat="admin in admins">
                    <td>{{admin.admin_user_id}}</td>
                    <td>{{admin.name}}</td>                
                </tr>
            </table>
        </div>
    </div>
</body>
        