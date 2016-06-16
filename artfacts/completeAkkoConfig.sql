USE IFSP
/*
	Drop de banco de dados criada para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

#Drops
drop table if exists `admin_user`;
drop table if exists `aditional_email`;
drop table if exists `adress`;
drop table if exists `attachment`;
drop table if exists `badge`;
drop table if exists `city`;
drop table if exists `contact`;
drop table if exists `government_district`;
drop table if exists `phone`;
drop table if exists `post`;
drop table if exists `profile_grade`;
drop table if exists `profile_idiom`;
drop table if exists `profile_photo`;
drop table if exists `profile_badge`;
drop table if exists `user_site`;
drop table if exists `grade`;
drop table if exists `experience`;
drop table if exists `badge_type`;
drop table if exists `published_work`;
drop table if exists `profile`;
drop table if exists `profile_type`;
drop table if exists `idiom`;
drop table if exists `idiom_level`;
drop table if exists `user`;
drop table if exists `country`;
drop event if exists evt_delete_inactive_user;
drop procedure if exists update_user_last_login;
drop procedure if exists update_user_is_confirmed;

/*
	Tabela de banco de dados criada para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

create table admin_user(
 	admin_user_id int auto_increment,
 	name varchar(255) not null unique,
 	pass_hash char(64) not null, /* Not store the password without hashing */
 	#Constrants
 	PRIMARY KEY (admin_user_id)
);

/* User data */
create table user(
 	user_id int auto_increment,
 	name varchar(255) not null,
 	mail varchar(255) not null, 
 	pass_hash char(64) not null, /* Not store the password without hashing */
 	is_confirmed tinyint(1) not null, /* 0 if email is not confirmed 1 for email confirmed */
 	created date not null, 
 	last_login date,
 	#Constrants
 	PRIMARY KEY (user_id)
);

/*Types of profiles that could be created. */
create table profile_type(
	type_id int auto_increment,
	name varchar(64) not null,
	description varchar(255),
	#Constrants
 	PRIMARY KEY (type_id)
);

/* User profile basics, must be completed with other data from other tables */
create table profile(
	profile_id int auto_increment,
	fk_user_id int not null, #fk to user_akko
	fk_profile_type_id int not null,
	complete_name varchar(255),
	about varchar(500),	
	birth date,
	alias varchar(64),
	curriculum varchar(512), #We will encorage the user to store this in other local and put a link here.	
	#Constrants
	PRIMARY KEY (profile_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id),
	FOREIGN KEY (fk_profile_type_id) REFERENCES profile_type(type_id),
	FULLTEXT complete_name_index (complete_name)
);

    /* Store countries */
	create table country(
		country_id int,# Not auto_increment because that will be used for phone too, and in phone there is a standart.
		name varchar(255) not null,
		thumb_pic varchar(255) not null,
		UF char(3) not null,
		#constrants
		PRIMARY KEY (country_id)
	);

	/* Store states */
	create table government_district(
		government_district_id int auto_increment,
		name varchar(64) not null,
		UF char(3) not null,
		fk_country int not null,
		#constrants
		PRIMARY KEY (government_district_id),
		FOREIGN KEY (fk_country) REFERENCES country(country_id)
	);

	/* store cities */
	create table city(
		city_id int auto_increment,
		name varchar(64) not null,
		fk_government_district int not null,#fk for the government district A.K.A. state.
		#constrants
		PRIMARY KEY (city_id),
		FOREIGN KEY (fk_government_district) REFERENCES government_district(government_district_id)
	);

	/*  Adress with city, state and country, that is only to find people near you,
	    Other data is unnessessary to store in our database, 
	   and must be in the user curriculum, portifolio or institutional site. */
	create table adress(		
		fk_profile_id int not null, #fk for profile
		fk_city_id int not null,#fk depending on government district
		#constrants
		PRIMARY KEY (fk_profile_id, fk_city_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
		FOREIGN KEY (fk_city_id) REFERENCES city(city_id)
	);	

	/* This table must store the grade informations based on country */
	create table grade(
		grade_id int auto_increment,
		title varchar(255) not null,
		pontuation int not null, # its based in our 'alghoritms', 
								 #we will use a number sequence for while
		fk_country_id int not null,#fk for country
		#Constrants
		PRIMARY KEY (grade_id),
		FOREIGN KEY (fk_country_id) REFERENCES country(country_id)
	);

		/* Make a link betwhen a grade and a profile */
		create table profile_grade(
			fk_profile_id int not null,# fk for profile_akko
		    fk_grade_id int not null,# fk to grade_akko
		    #Constrants
			PRIMARY KEY (fk_grade_id,fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_grade_id) REFERENCES grade(grade_id)
		);

	/* Tabela para guardar a experiência do usuário */
	create table experience(
		experience_id int auto_increment,
		fk_profile_id int not null,# fk for profile_akko
		title varchar(64) not null,
		content varchar(500) not null,
		date_ini date not null,
		date_end date,
		#Constrants
		PRIMARY KEY (experience_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);

	/* Links from user sites for them profile */
	create table user_site(
		user_site_id int auto_increment,
		fk_profile_id int not null,# fk for profile_akko
		URL varchar(500) not null, # the URL to make a link
		alias varchar(255) not null, # the text to show as URL
		#Constrants
		PRIMARY KEY (user_site_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);	

	/* User publishd work table */
	create table published_work(
		published_work_id int auto_increment,
		fk_profile_id int not null,# fk for profile_akko
		title varchar(255) not null,
		type int not null,
		description varchar(500) not null,
		#Constrants
		PRIMARY KEY (published_work_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);

	/* Store the profile photo path in the server, and some data from them */
	create table profile_photo(
		profile_photo_id int auto_increment,
		fk_profile_id int not null, #fk for profile,
		photo_path varchar(255) not null,
		update_date date not null, # when it entered the system,
		#Constrants
		PRIMARY KEY (profile_photo_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);

	create table idiom_level(
		idiom_level_id int auto_increment,
		name varchar(64),
		description varchar(255),
		#Constrants
		PRIMARY KEY (idiom_level_id)
	);

	/* Table to store user idioms */
	create table idiom(
		idiom_id int auto_increment,
		name varchar(64) not null,
		fk_country_id int not null,
		#Constrants
		PRIMARY KEY (idiom_id),
		FOREIGN KEY (fk_country_id) REFERENCES country(country_id)
	);

		/* Link the user with the idiom */
		create table profile_idiom(
			fk_profile_id int not null,# fk for profile_akko
		    fk_idiom_id int not null,# fk idiom
		    fk_idiom_level_id int not null,# fk idiom_level
		    #Constrants
			PRIMARY KEY (fk_idiom_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_idiom_id) REFERENCES idiom(idiom_id),
			FOREIGN KEY (fk_idiom_level_id) REFERENCES idiom_level(idiom_level_id)
		);		

	/* Profile contacts info */
	create table phone(
		phone_id int auto_increment,
		fk_profile_id int not null, #fk for profile,
		fk_phone_country int not null, #fk for countries prefix number (!!!)
		phone_number varchar(32) not null,
		#constrants
		PRIMARY KEY (phone_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);	

	create table aditional_email(
		email_id int auto_increment,
		fk_profile_id int not null, #fk for profile,
		adress varchar(255),
		#constrants
		PRIMARY KEY (email_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);	

/* This will store a user post. */
create table post(
	post_id int,	
	fk_user_id int not null, #fk for user,
	content varchar(1024) not null,
	date_of_post date not null,
	#constrants
	PRIMARY KEY (post_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id),
	FULLTEXT content_index (content)
);

	/* This will store the attachiments */
	create table attachment(
		attachment_id int,
		att_date date not null,
		att_path varchar(500) not null, #Where the file was stored in the server, 
									    #depending on the infra we choose it would be a URL;
		fk_post_id int not null, #Fk to post_akko
		#constrants
		PRIMARY KEY (attachment_id),
		FOREIGN KEY (fk_post_id) REFERENCES post(post_id)
	);

# That will make a link betwheen a user and other user
create table contact(
	fk_profile_id int not null,
	fk_profile_id_contact int not null,
	# type int not null,
	is_accepted tinyint(1) not null, # If the contact accepted the friendship
	accepted_date date,
	# Constrants
	PRIMARY KEY (fk_profile_id, fk_profile_id_contact),
	FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
	FOREIGN KEY (fk_profile_id_contact) REFERENCES profile(profile_id)
);

create table badge_type(
	type_id int auto_increment,
	name varchar(64),
	# Constrants
	PRIMARY KEY (type_id)
);

# medals will be created by the internal team.
create table badge(
	badge_id int auto_increment,
	fk_type_id int not null,
	title varchar(64) not null,
	description varchar(511),
	thumb varchar(255) not null,
	# Constrants
	PRIMARY KEY (badge_id),
	FOREIGN KEY (fk_type_id) REFERENCES badge_type(type_id),
	FULLTEXT title_index (title)
);

	# Link the profile with a medal, given by other user.
	create table profile_badge(
		fk_profile_id_owner int not null,
		fk_profile_id_giver int not null,
		fk_badge_id int not null,
		date_given date not null,
		# Constrants
		PRIMARY KEY (fk_badge_id, fk_profile_id_owner, fk_profile_id_giver),
		FOREIGN KEY (fk_profile_id_owner) REFERENCES profile(profile_id),
		FOREIGN KEY (fk_profile_id_giver) REFERENCES profile(profile_id)
	);

/*
	Tests de insert para banco de dados criado para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

insert into admin_user values (01, 'JVidiri', PASSWORD('@cfjl12365'));
insert into admin_user values (02, 'Admin', PASSWORD('123'));

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

/*
	PRocedures events e Functions para tabela de banco de dados criada para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

/* 
	Updates the last login date from given user.
*/
create procedure update_user_last_login(useId int)
	update user set last_login = STR_TO_DATE(curdate(), '%Y-%m-%d') where `user`.`user_id` = useId;

/* 
	Updates the given user confirmation e-mail with the passed flag.
	This must be 1 for confirmed and 0 for uncofirmed
*/
create procedure update_user_is_confirmed(useId int, isConfirmed int)
	update user set is_confirmed = isConfirmed where `user`.`user_id` = useId;

/*
	Event to delete user who don't confirm email, will run every two days.
*/
CREATE EVENT evt_delete_inactive_user
	ON SCHEDULE EVERY 2 DAY
	STARTS '2016-3-28 00:00:00'
DO
  	DELETE FROM user Where is_confirmed = 0;

