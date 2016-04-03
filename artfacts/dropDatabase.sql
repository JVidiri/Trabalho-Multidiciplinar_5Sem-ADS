/*
	Drop de banco de dados criada para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

#Drops
drop table if exists admin_user;
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
drop table if exists idiom_level;
drop table if exists idiom;
drop table if exists grade;
drop table if exists experience;
drop table if exists country;
drop table if exists badge_type;
drop event if exists evt_delete_inactive_user;
drop procedure if exists update_user_last_login;
drop procedure if exists update_user_is_confirmed;