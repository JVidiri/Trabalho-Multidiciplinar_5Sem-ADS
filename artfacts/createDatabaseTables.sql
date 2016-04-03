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
 	name varchar(255) not null,
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
	complete_name varchar(255) not null,
	about varchar(500) not null,	
	birth date not null,
	alias varchar(64),
	curriculum varchar(512), #We will encorage the user to store this in other local and put a link here.	
	#Constrants
	PRIMARY KEY (profile_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id),
	FOREIGN KEY (fk_profile_type_id) REFERENCES profile_type(type_id)
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
		title varchar(64) not null,
		content varchar(500) not null,
		date_ini date not null,
		date_end date,
		#Constrants
		PRIMARY KEY (experience_id)
	);

		/*Link da experiência com o perfil */
		create table profile_experience(
			fk_profile_id int not null,# fk for profile_akko
		    fk_experience_id int not null,# fk for experience_akko
		    #Constrants
			PRIMARY KEY (fk_experience_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_experience_id) REFERENCES experience(experience_id)
		);		

	/* Links from user sites for them profile */
	create table user_site(
		user_site_id int auto_increment,
		URL varchar(500) not null, # the URL to make a link
		alias varchar(255) not null, # the text to show as URL
		#Constrants
		PRIMARY KEY (user_site_id)
	);	

		/* Link da do site com o perfil */
		create table profile_user_site(
			fk_profile_id int not null,# fk for profile_akko
		    fk_user_site_id int not null,# fk user_site_akko
		    #Constrants		    
			PRIMARY KEY (fk_user_site_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_user_site_id) REFERENCES user_site(user_site_id)
		);		

	/* User publishd work table */
	create table published_work(
		published_work_id int auto_increment,
		title varchar(255) not null,
		type int not null,
		description varchar(500) not null,
		#Constrants
		PRIMARY KEY (published_work_id)
	);

		/* Link da do site com o perfil */
		create table profile_published_work(
			fk_profile_id int not null,# fk for profile_akko
		    fk_published_work_id int not null,# fk published_work_akko
		    #Constrants
			PRIMARY KEY (fk_published_work_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_published_work_id) REFERENCES published_work(published_work_id)
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
		phone_number varchar(32) not null,
		fk_phone_country int not null, #fk for countries prefix number (!!!)
		fk_profile_id int not null, #fk for profile,
		#constrants
		PRIMARY KEY (phone_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
	);	

	create table aditional_email(
		email_id int auto_increment,
		adress varchar(255),
		fk_profile_id int not null, #fk for profile,
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
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id)
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
	badge_id int not null,
	fk_type_id int not null,
	title varchar(64) not null,
	description varchar(511),
	thumb varchar(255) not null,
	# Constrants
	PRIMARY KEY (badge_id),
	FOREIGN KEY (fk_type_id) REFERENCES badge_type(type_id)
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