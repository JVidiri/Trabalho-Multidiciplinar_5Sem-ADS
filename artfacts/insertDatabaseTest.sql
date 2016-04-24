/*
	Tests de insert para banco de dados criado para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

insert into admin_user values (01, 'JVidiri', PASSWORD('@cfjl12365'));

insert into user values (665,'João', 'jovidiri@mail.com', PASSWORD('joao12365'), 1, STR_TO_DATE('20/03/2016', '%d/%m/%Y'), STR_TO_DATE('20/03/2016', '%d/%m/%Y'));
insert into user values (666,'Leticia', 'leticc@outlook.com', PASSWORD('leticia12365'), 1,  STR_TO_DATE('21/03/2016', '%d/%m/%Y'), STR_TO_DATE('29/03/2016', '%d/%m/%Y'));
insert into user values (667,'Martoni', 'tony@mail.com', PASSWORD('martoni12365'), 0,  STR_TO_DATE('28/03/2016', '%d/%m/%Y'), STR_TO_DATE('29/03/2016', '%d/%m/%Y'));

insert into profile_type values (01, 'Usuário', 'Perfil pessoal.');
insert into profile_type values (02, 'Instituição', 'Perfil para empresas, Instituições, Escolas, Faculdades e etc...');

insert into profile values (665, 665, 01, 'João Pedro Santos Vidiri','A great programmer! And a kindfull Dog owner...',
	STR_TO_DATE('03/07/1995', '%d/%m/%Y'), 'jvidiri', 'https://docs.google.com/document/d/1WSusDwTLLy1lNaCWbFiDJAJFDPnbj7bGIWlRubIL5Y8/edit?usp=sharing');
insert into profile values (666, 666, 01, 'Leticia Bruna','Queen of the hell...',
	STR_TO_DATE('21/05/1993', '%d/%m/%Y'), 'lbruna', 'https://docs.google.com/document/d/1WSusDwTLLy1lNaCWbFiDJAJFDPnbj7bGIWlRubIL5Y8/edit?usp=sharing');

insert into country values(55, 'Brasil', 'brasil.png', 'BR');

insert into government_district values(01, 'São Paulo', 'SP',55);
insert into government_district values(02, 'Minas Gerais', 'MG',55);

insert into city values(01,'Campinas', 01);
insert into city values(02,'São Paulo', 01);
insert into city values(03,'Belo Horizonte', 02);

insert into adress values (666, 01);

insert into grade values (01, 'Ensino Fundamental incompleto', 1, 55);
insert into grade values (02, 'Pós graduação completa', 50, 55);# 'Pós graduação' is 50 times more important than 'Ensino Fundamental'

insert into profile_grade values (666,02);

insert into experience values (01, 666, 'Webmaster em Ed Interactive', 
							'Manutenção de sites para clientes corporativos 
							em mais de 20 paises da américa latina.',							
							STR_TO_DATE('03/09/2015', '%d/%m/%Y'), 
							null);

insert into user_site values (01, 666, 'https://github.com/jvidiri', 'Github Jvidiri');

insert into published_work values (01, 666, 'Promocional', 'Site', 'Teste.com.br');

insert into profile_photo values (01, 666, 'img/users/192387178432204823.png', STR_TO_DATE('21/03/2016', '%d/%m/%Y'));	

insert into idiom_level values (01, 'Fluênte', 'Domina a lingua como um nativo.');
insert into idiom_level values (02, 'Avançado', 'Domina a lingua para manter conversações, escrever e ler sem grandes dificuldades.');
insert into idiom_level values (03, 'Médio', 'Domina a lingua para leitura, escrita e conversação com dificuldades.');	
insert into idiom_level values (04, 'Básico', 'Não domina a lingua bem, mas tem conhecimento em algumas palavras ou frases.');

insert into idiom values (01, 'Português', 55);

insert into profile_idiom values (666, 1, 1);

insert into phone values (01, 666, 55, '(19) 925009388');

insert into aditional_email values (01, 666, 'jovidiri@out.com');

insert into post values (01, 666, 'Meu primeiro post', STR_TO_DATE('21/03/2016', '%d/%m/%Y'));

insert into attachment values (01, STR_TO_DATE('21/03/2016', '%d/%m/%Y'), '/att/01/823ry814hqfidfh.jpg', 01 );

insert into contact values (665,666, 0, STR_TO_DATE('22/03/2016', '%d/%m/%Y'));

insert into badge_type values (01, 'Informática');
insert into badge_type values (02, 'Hells');

insert into badge values(01, 01, 'SQL Junior', 'This user knows the basics of SQL and have some practical experience with it.','/img/medals/askjdfhlajdhfjas.jpg');
insert into badge values(02, 02, 'HR of hell', 'This User makes the Human resources of Hell.','img/medals/askjdfhlajdhsdafds.jpg');

insert into profile_badge values (666, 665, 02, STR_TO_DATE('23/03/2016', '%d/%m/%Y'));
insert into profile_badge values (665, 666, 01, STR_TO_DATE('23/03/2016', '%d/%m/%Y'));