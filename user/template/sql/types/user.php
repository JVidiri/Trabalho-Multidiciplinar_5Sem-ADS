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
	public $mail;
    public $password;
	public $is_confirmed;
	public $created;
	public $last_login;

    public function __construct($user_id, $name, $mail, $password, $is_confirmed, $created, $last_login){
        $this->user_id = $user_id;
        $this->name = $name;
        $this->mail = $mail;
        $this->password = $password;
        $this->is_confirmed = $is_confirmed;
        $this->created = $created;
        $this->last_login = $last_login;
    }
}
?>