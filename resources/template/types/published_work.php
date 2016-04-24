<?php
/*
table published_work(
	published_work_id int auto_increment,
	fk_profile_id int not null,# fk for profile_akko
	title varchar(255) not null,
	type int not null,
	description varchar(500) not null,
	#Constrants
	PRIMARY KEY (published_work_id),
	FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id)
);
*/

class publishedWork{
	public $published_work_id;
	public $fk_profile_id;
	public $title;
	public $type;
	public $description;

	public function __construct(published_work_id, fk_profile_id, title, type, description){
		$this->published_work_id = $published_work_id;
		$this->fk_profile_id = $fk_profile_id;
		$this->title = $title;
		$this->type = $type;
		$this->description = $description;
	}
}
?>