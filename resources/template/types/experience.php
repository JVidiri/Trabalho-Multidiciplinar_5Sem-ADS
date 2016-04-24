<?php
/*
table experience(
	experience_id int auto_increment,
	title varchar(64) not null,
	content varchar(500) not null,
	date_ini date not null,
	date_end date,
	#Constrants
	PRIMARY KEY (experience_id)
);
*/
class experience{
	public $experience_id;
	public $title;
	public $content;
	public $date_ini;
	public $date_end;

	public function __construct($grade_id, $title, $content, date_ini, date_end){
		$this->grade_id = $grade_id;
		$this->title = $title;
		$this->content = $content;
		$this->date_ini = $date_ini;
		$this->date_end = $date_end;
	}
}
?>