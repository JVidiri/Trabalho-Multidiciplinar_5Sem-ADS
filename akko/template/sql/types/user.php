<?php
/*
    table user(
        user_id int auto_increment,
        name varchar(255) not null,
        email varchar(255) not null,
        pass_hash char(64) not null,
        is_confirmed bit not null,
        created date not null, 
        last_login date not null,        
    );
*/
class user{
	public $user_id;
	public $name;
	public $email;
	public $pass_hash;
	public $is_confirmed;
	public $created;
	public $last_login;
}
?>