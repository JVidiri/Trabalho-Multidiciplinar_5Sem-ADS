/* User data */
create table user(
 	user_id int auto_increment,
 	name varchar(255) not null,
 	email varchar(255) not null,
 	pass_hash char(64) not null, /* Not store the password without hashing */
 	is_confirmed bit not null, /* 0 if email is not confirmed 1 for email confirmed */
 	#Constrants
 	PRIMARY KEY (user_id)
);

/* User profile basics, must be completed with the other data from the other tables */
create table profile(
	profile_id int auto_increment,
	fk_user_id int not null, #fk to user_akko
	complete_name varchar(255) not null,
	about varchar(500) not null,
	type char not null,
	birth date not null,
	alias varchar(64),
	curriculum varchar(255), #we will encorage the user to stre this in other local and put a link here.
	#Constrants
	PRIMARY KEY (profile_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id)
);
    /* Store countries */
	create table country(
		country_id int,# Not auto_increment because that will be used for phone too, and in phone there is a standart.
		name varchar(255) not null,
		thumb_pic varchar(255) not null,
		#constrants
		PRIMARY KEY (country_id)
	);

	/* Store states */
	create table government_district(
		government_district_id int auto_increment,
		name varchar(64),
		fk_country int not null,
		#constrants
		PRIMARY KEY (government_district_id),
		FOREIGN KEY (fk_country) REFERENCES country(country_id)
	);

	/* store cities */
	create table city(
		city_id int auto_increment,
		name varchar(64),
		fk_government_district int not null,#fk for the government district A.K.A. 
		#constrants
		PRIMARY KEY (city_id),
		FOREIGN KEY (fk_government_district) REFERENCES government_district(government_district_id)
	);

	/*  Adress with city, state and countryn that is only to find people near you,
	    Other data is unnessessary to store in our database, 
	   and must be in the user curriculum */
	create table adress(
		adress_id int auto_increment,
		fk_profile_id int not null, #fk for profile,
		fk_country_id int not null,#fk for country
		fk_government_district_id int not null, #fk depending on country
		fk_city_id int not null,#fk depending on government district
		#constrants
		PRIMARY KEY (adress_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
		FOREIGN KEY (fk_country_id) REFERENCES country(country_id),
		FOREIGN KEY (fk_government_district_id) REFERENCES profile(profile_id),
		FOREIGN KEY (fk_city_id) REFERENCES city(city_id)
	);

	/* Tabela que guardará as informações de formação do usuário */
	create table grade(
		grade_id int auto_increment,
		title varchar(255) not null,
		pontuation int not null, # its based in our alghoritms
		#Constrants
		PRIMARY KEY (grade_id)
	);

		/* Tabela para fazer o link entre a formação(ões) e o perfil*/
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
		update_date date not null, # when it entered the sistem,
		#Constrants
		PRIMARY KEY (profile_photo_id),
		FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
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
		    idiom_level char not null,
		    #Constrants
			PRIMARY KEY (fk_idiom_id, fk_profile_id),
			FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
			FOREIGN KEY (fk_idiom_id) REFERENCES idiom(idiom_id)
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


/* Tabela para armazenar  */
create table post(
	post_id int,	
	fk_user_id int not null, #fk for user,
	post_content varchar(1024) not null,
	#constrants
	PRIMARY KEY (post_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id)
);

	/* This will store the attachiments */
	create table attachment_akko(
		attachment_id int,
		att_date date not null,
		att_path varchar(500) not null, #Where the file was stored in the server, 
											   #depending on the infra we choose it would be a URL
		fk_post_id int not null, #Fk to post_akko
		#constrants
		PRIMARY KEY (attachment_id),
		FOREIGN KEY (fk_post_id) REFERENCES post(post_id)
	);