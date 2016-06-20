<?php
/*
table profile_photo(
	profile_photo_id int auto_increment,
	fk_profile_id int not null, #fk for profile,
	photo_path varchar(255) not null,
	update_date date not null, # when it entered the system,
	#Constrants
	PRIMARY KEY (profile_photo_id),
	FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
);
*/
class profilePhoto{
	public $profile_photo_id;
	public $fk_profile_id;
	public $photo_path;
	public $update_date;

	public function __construct($profile_photo_id, $fk_profile_id, $photo_path, $update_date){
		$this->profile_photo_id = $profile_photo_id;
		$this->fk_profile_id = $fk_profile_id;
		$this->photo_path = $photo_path;
		$this->update_date = $update_date;
	}	
}
?>