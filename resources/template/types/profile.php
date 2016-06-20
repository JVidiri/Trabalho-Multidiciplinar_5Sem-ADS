<?php
/*table profile(
	profile_id int auto_increment,
	fk_user_id int not null, #fk to user_akko
	fk_profile_type_id int not null,
	complete_name varchar(255),
	about varchar(500),	
	birth date,
	alias varchar(64),
	curriculum varchar(512), #We will encorage the user to store this in other local and put a link here.		
);*/

class profile{
	public $profile_id;
	public $fk_user_id;
	public $fk_profile_type_id;
	public $complete_name;
	public $about;
	public $birth;
	public $alias;
	public $curriculum;

	public function __construct($profile_id, $fk_user_id, $fk_profile_type_id, 
		$complete_name, $about, $birth, $alias, $curriculum){
		        
        $this->profile_id = $profile_id;
		$this->fk_user_id = $fk_user_id;
		$this->fk_profile_type_id = $fk_profile_type_id;
		$this->complete_name = $complete_name;
		$this->about = $about;
		$this->birth = $birth;
		$this->alias = $alias;
		$this->	$curriculum = $curriculum;        
    }
}
?>