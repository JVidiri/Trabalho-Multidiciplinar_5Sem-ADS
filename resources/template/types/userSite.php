<?php 
/*
table user_site(
	user_site_id int auto_increment,
	fk_profile_id int not null,# fk for profile_akko
	URL varchar(500) not null, # the URL to make a link
	alias varchar(255) not null, # the text to show as URL
	#Constrants
	PRIMARY KEY (user_site_id)
	FOREIGN KEY (fk_profile_id) REFERENCES profile(profile_id),
);
*/

class userSite{
	public $user_site_id;
	public $fk_profile_id;
	public $url;
	public $alias;

	public function __construct($user_site_id, $fk_profile_id, $url, $alias){
		$this->user_site_id = $user_site_id;
		$this->fk_profile_id = $fk_profile_id;
		$this->url = $url;
		$this->alias = $alias;
	}
}
?>