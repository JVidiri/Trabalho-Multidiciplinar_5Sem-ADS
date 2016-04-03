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
	<div class="contentAdmin" id="content">
		<h3>Bem vindo, selecione uma das opções no menu ao lado.</h3>
	</div>
</body>
</html>