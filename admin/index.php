<?php 
  require_once('head.php');
  require_once($rootPath . '/resources/template/sql/dbFacade.php');
  require_once($rootPath . '/resources/adminAccessControl.php');
?>  
<body>
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
  <div class="header">
    <h1>Akko Admin</h1>   
  </div>
  <div class="leftMenu">
    <ul>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/admin.php?lastElement=0');" target="#content">Usuário admin</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/users.php?lastElement=0');" target="#content">Usuário comum</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/badges.php?lastElement=0');" target="#content">Medalhas</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/country.php?lastElement=0');" target="#content">País</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/governmentDistrict.php?lastElement=0');" target="#content">Distrito governamental</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/city.php?lastElement=0');" target="#content">Cidade</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/grade.php?lastElement=0');" target="#content">Grau de escolaridade</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/idiom.php?lastElement=0');" target="#content">Idioma</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/idiomLevel.php?lastElement=0');" target="#content">Niveis de idioma</a></li>
      <li><a href="javascript:clientSideRequest('content', '/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/list/profileType.php?lastElement=0');" target="#content">Tipos de perfil</a></li>
    </ul>
  </div>
  <div class="container" ng-app="adminApp" ng-controller="adminCtrl">
      <div class="row">
          <div class="col s12">
              <h4>Cadastros</h4>
              <!-- modal for for creating new product -->
              <div id="modal-admin-form" class="modal">
                  <div class="modal-content">
                      <h4 id="modal-admin-title">Adicionar novo administrador</h4>
                      <!-- modal for for creating new product -->
                      <div id="modal-admin-form" class="modal">
                        <div class="modal-content">            
                            <md-content class="md-padding">
                              <div layout="column" layout-padding="" ng-cloak="" class="login-container" ng-app="AkkoApp">
                                <md-content md-theme="AkkoTheme" class="md-no-momentum " layout-padding>
                                  <h3>Login</h3>
                                  <form role="form" method="post" action="<?php echo $submitAction ?>" >
                                    <?php //utilização do metodo post para envio de dados, O submitAction vem do arquivo que inclui este form. ?>
                                      <md-input-container class="md-icon-float md-block">         
                                        <label>Nome</label>
                                        <md-icon class="name">
                                          <i class="material-icons">face</i>
                                        </md-icon>
                                        <input ng-model="name" type="text" name="name"><?php //Nome somente receberá um texto ?>
                                      </md-input-container>    
                                      <md-input-container class="md-icon-float md-block">           
                                        <label>Senha</label>
                                          <md-icon class="name">
                                            <i class="material-icons">vpn_key</i>
                                          </md-icon>
                                          <?php //Password do usuário, não deve ser um campo de texto normal. ?>
                                          <input ng-model="password" type="password" name="password">
                                      </md-input-container>
                                      <md-input-container class="md-icon-float md-block">           
                                        <label>Senha</label>
                                          <md-icon class="name">
                                            <i class="material-icons">vpn_key</i>
                                          </md-icon>
                                          <?php //Password do usuário, não deve ser um campo de texto normal. ?>
                                          <input ng-model="password_conf" type="password" name="password_conf">
                                      </md-input-container>
                                    <div class="form-group">
                                      <md-button class="md-raised md-accent" type="submit">Salvar</md-button>
                                    </div>    
                                  </form>   
                                </md-content>
                              </div>
                            </md-dialog>
                          </md-content>
                        </div>
                      </div>
                  </div>
                </div>
                <!-- floating button for creating product -->
                <div class="fixed-action-btn" style="bottom:45px; right:24px;">
                    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-admin-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a
                </div>
          </div> <!-- end col s12 -->
      </div> <!-- end row -->
  </div> <!-- end container -->
</body>
<script src="/Trabalho-Multidiciplinar_5Sem-ADS/resources/js/adminMdController.js"></script>
</html>