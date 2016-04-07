<?php
/*
    table admin_user(
        admin_user_id int auto_increment,
        name varchar(255) not null,
        pass_hash char(64) not null, 
        #Constrants
        PRIMARY KEY (user_id)
    );
*/
class admin{
	public $admin_user_id;
	public $name;	
    public $pass_hash;	

    public function __construct($admin_user_id, $name, $pass_hash){
        $this->admin_user_id = $admin_user_id;
        $this->name = $name;       
        $this->pass_hash = $pass_hash;        
    }
}
?>