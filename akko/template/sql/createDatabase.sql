/*
	Tabela de banco de dados criada para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

#Drops
drop table if exists aditional_email;
drop table if exists adress;
drop table if exists attachment;
drop table if exists badge;
drop table if exists city;
drop table if exists contact;
drop table if exists government_district;
drop table if exists phone;
drop table if exists post;
drop table if exists profile_experience;
drop table if exists profile_grade;
drop table if exists profile_idiom;
drop table if exists profile_photo;
drop table if exists profile_published_work;
drop table if exists profile_user_site;
drop table if exists profile_badge;
drop table if exists published_work;
drop table if exists profile;
drop table if exists profile_type;
drop table if exists user_site;
drop table if exists user;
drop table if exists idiom;
drop table if exists grade;
drop table if exists experience;
drop table if exists country;
drop table if exists badge_type;
drop event if exists evt_delete_inactive_user;

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

insert into user values (665,'João', 'jovidiri@mail.com', PASSWORD('joao12365'), 1, STR_TO_DATE('20/03/2016', '%d/%m/%Y'), STR_TO_DATE('20/03/2016', '%d/%m/%Y'));
insert into user values (666,'Leticia', 'leticc@outlook.com', PASSWORD('leticia12365'), 1,  STR_TO_DATE('21/03/2016', '%d/%m/%Y'), STR_TO_DATE('29/03/2016', '%d/%m/%Y'));
insert into user values (667,'Martoni', 'tony@mail.com', PASSWORD('martoni12365'), 0,  STR_TO_DATE('28/03/2016', '%d/%m/%Y'), STR_TO_DATE('29/03/2016', '%d/%m/%Y'));

/*Types of profiles that could be created. */
create table profile_type(
	type_id int auto_increment,
	name varchar(64) not null,
	description varchar(255),
	#Constrants
 	PRIMARY KEY (type_id)
);

insert into profile_type values (01, 'Usuário', 'Perfil pessoal.');
insert into profile_type values (02, 'Instituição', 'Perfil para empresas, Instituições, Escolas, Faculdades e etc...');

/* User profile basics, must be completed with the other data from the other tables */
create table profile(
	profile_id int auto_increment,
	fk_user_id int not null, #fk to user_akko
	fk_profile_type_id int not null,
	complete_name varchar(255) not null,
	about varchar(500) not null,	
	birth date not null,
	alias varchar(64),
	curriculum varchar(512), #we will encorage the user to stre this in other local and put a link here.	
	#Constrants
	PRIMARY KEY (profile_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id),
	FOREIGN KEY (fk_profile_type_id) REFERENCES profile_type(type_id)
);

insert into profile values (665, 665, 01, 'João Pedro Santos Vidiri','A great programmer! And a kindfull Dog owner...',
	STR_TO_DATE('03/07/1995', '%d/%m/%Y'), 'jvidiri', 'https://docs.google.com/document/d/1WSusDwTLLy1lNaCWbFiDJAJFDPnbj7bGIWlRubIL5Y8/edit?usp=sharing');
insert into profile values (666, 666, 01, 'Leticia Bruna','Queen of the hell...',
	STR_TO_DATE('21/05/1993', '%d/%m/%Y'), 'lbruna', 'https://docs.google.com/document/d/1WSusDwTLLy1lNaCWbFiDJAJFDPnbj7bGIWlRubIL5Y8/edit?usp=sharing');

    /* Store countries */
	create table country(
		country_id int,# Not auto_increment because that will be used for phone too, and in phone there is a standart.
		name varchar(255) not null,
		thumb_pic varchar(255) not null,
		UF char(3) not null,
		#constrants
		PRIMARY KEY (country_id)
	);

	insert into country values(55, 'Brasil', 'brasil.png', 'BR');

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

	insert into government_district values(01, 'São Paulo', 'SP',55);
	insert into government_district values(02, 'Minas Gerais', 'MG',55);

	/* store cities */
	create table city(
		city_id int auto_increment,
		name varchar(64) not null,
		fk_government_district int not null,#fk for the government district A.K.A. state.
		#constrants
		PRIMARY KEY (city_id),
		FOREIGN KEY (fk_government_district) REFERENCES government_district(government_district_id)
	);

	insert into city values(01,'Campinas', 01);
	insert into city values(02,'São Paulo', 01);
	insert into city values(03,'Belo Horizonte', 02);

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

	insert into adress values (666, 01);

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

	insert into grade values (01, 'Ensino Fundamental incompleto', 1, 55);
	insert into grade values (02, 'Pós graduação completa', 50, 55); 
	# 'Pós graduação' is 50 times more important than 'Ensino Fundamental'

		/* Make a link betwhen a grade and a profile */
		create table profile_grade(
			fk_profile_id int not null,# fk for profile_akko
		    fk_grade_id int not null,# fk to grade_akko
		    #Constrants
			PRIMARY KEY (fk_grade_id,fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_grade_id) REFERENCES grade(grade_id)
		);

		insert into profile_grade values (666,02);


	/* Tabela para guardar a experiência do usuário */
	create table experience(
		experience_id int auto_increment,
		title varchar(64) not null,
		content varchar(500) not null,
		date_ini date not null,
		date_end date,
		#Constrants
		PRIMARY KEY (experience_id)
	);

	insert into experience values (01, 'Webmaster em Ed Interactive', 
								'Manutenção de sites para clientes corporativos 
								em mais de 20 paises da américa latina.',
								STR_TO_DATE('03/09/2015', '%d/%m/%Y'), 
								null);

		/*Link da experiência com o perfil */
		create table profile_experience(
			fk_profile_id int not null,# fk for profile_akko
		    fk_experience_id int not null,# fk for experience_akko
		    #Constrants
			PRIMARY KEY (fk_experience_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_experience_id) REFERENCES experience(experience_id)
		);

		insert into profile_experience values (666, 01);

	/* Links from user sites for them profile */
	create table user_site(
		user_site_id int auto_increment,
		URL varchar(500) not null, # the URL to make a link
		alias varchar(255) not null, # the text to show as URL
		#Constrants
		PRIMARY KEY (user_site_id)
	);

	insert into user_site values (01, 'https://github.com/jvidiri', 'Github Jvidiri');

		/* Link da do site com o perfil */
		create table profile_user_site(
			fk_profile_id int not null,# fk for profile_akko
		    fk_user_site_id int not null,# fk user_site_akko
		    #Constrants		    
			PRIMARY KEY (fk_user_site_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_user_site_id) REFERENCES user_site(user_site_id)
		);

		insert into profile_user_site values (666, 01);

	/* User publishd work table */
	create table published_work(
		published_work_id int auto_increment,
		title varchar(255) not null,
		type int not null,
		description varchar(500) not null,
		#Constrants
		PRIMARY KEY (published_work_id)
	);

	insert into published_work values (01, '3M BR promocional', 
										   'Site', 
										   'http://solutions.3m.com.br/wps/portal/3M/pt_BR/3M-Careers-LA/Junte-se+a+Nos/invent+a+new+future \n Site desenvolvido no CMS da IBM FatWire.');

		/* Link da do site com o perfil */
		create table profile_published_work(
			fk_profile_id int not null,# fk for profile_akko
		    fk_published_work_id int not null,# fk published_work_akko
		    #Constrants
			PRIMARY KEY (fk_published_work_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_published_work_id) REFERENCES published_work(published_work_id)
		);

		insert into profile_published_work values (666, 01);

	/* Store the profile photo path in the server, and some data from them */
	create table profile_photo(
		profile_photo_id int auto_increment,
		fk_profile_id int not null, #fk for profile,
		photo_path varchar(255) not null,
		update_date date not null, # when it entered the sistem,
		#Constrants
		PRIMARY KEY (profile_photo_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);

	insert into profile_photo values (01, 666, 
										'img/users/192387178432204823.png', 
										STR_TO_DATE('21/03/2016', '%d/%m/%Y'));

	/* Table to store user idioms */
	create table idiom(
		idiom_id int auto_increment,
		name varchar(64) not null,
		fk_country_id int not null,
		#Constrants
		PRIMARY KEY (idiom_id),
		FOREIGN KEY (fk_country_id) REFERENCES country(country_id)
	);

	insert into idiom values (01, 'Português', 55);

		/* Link the user with the idiom */
		create table profile_idiom(
			fk_profile_id int not null,# fk for profile_akko
		    fk_idiom_id int not null,# fk idiom
		    idiom_level int not null,# 1 for Fluent, 
		    						 # 2 for Advanced, 
		    						 # 3 for Medium,
		    						 # 4 for User do not know the idiom
		    #Constrants
			PRIMARY KEY (fk_idiom_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_idiom_id) REFERENCES idiom(idiom_id)
		);

		insert into profile_idiom values (666, 01, 1);

	/* Profile contacts info */
	create table phone(
		phone_id int auto_increment,
		phone_number varchar(32) not null,
		fk_phone_country int not null, #fk for countries prefix number (!!!)
		fk_profile_id int not null, #fk for profile,
		#constrants
		PRIMARY KEY (phone_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);

	insert into phone values (01, '(19) 925009388', 55, 666);

	create table aditional_email(
		email_id int auto_increment,
		adress varchar(255),
		fk_profile_id int not null, #fk for profile,
		#constrants
		PRIMARY KEY (email_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);

	insert into aditional_email values (01, 'joao.vidiri@outlook.com', 666);

/* This will store a user post. */
create table post(
	post_id int,	
	fk_user_id int not null, #fk for user,
	content varchar(1024) not null,
	date_of_post date not null,
	#constrants
	PRIMARY KEY (post_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id)
);

insert into post values (01, 666, 'Meu primeiro post', STR_TO_DATE('21/03/2016', '%d/%m/%Y'));

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

	insert into attachment values (01,
										STR_TO_DATE('21/03/2016', '%d/%m/%Y'),
										'/att/01/823ry814hqfidfh.jpg', 01 );

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

insert into contact values (665,666, 0, STR_TO_DATE('22/03/2016', '%d/%m/%Y'));

create table badge_type(
	type_id int auto_increment,
	name varchar(64),
	# Constrants
	PRIMARY KEY (type_id)
);

insert into badge_type values (01, 'Informática');
insert into badge_type values (02, 'Hells');

# medals will be created by the internal team.
create table badge(
	badge_id int not null,
	fk_type_id int not null,
	title varchar(64) not null,
	description varchar(511),
	thumb varchar(255) not null,
	# Constrants
	PRIMARY KEY (badge_id),
	FOREIGN KEY (fk_type_id) REFERENCES badge_type(type_id)
);

insert into badge values(01, 01, 'SQL Junior', 'This user knows the basics of SQL and have some practical experience with it.','/img/medals/askjdfhlajdhfjas.jpg');
insert into badge values(02, 02, 'HR of hell', 'This User makes the Human resources os Hell.','img/medals/askjdfhlajdhsdafds.jpg');
	
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

	insert into profile_badge values (666, 665, 02, STR_TO_DATE('23/03/2016', '%d/%m/%Y'));
	insert into profile_badge values (665, 666, 01, STR_TO_DATE('23/03/2016', '%d/%m/%Y'));

/*
	Event to delete user who don't confirm email, will run every two days.
*/
CREATE EVENT evt_delete_inactive_user
	ON SCHEDULE EVERY 2 DAY
	STARTS '2016-3-28 00:00:00'
DO
  	DELETE FROM user Where is_confirmed = 0;