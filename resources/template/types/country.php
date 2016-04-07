<?php 
/* 
	table country(
		country_id int,# Not auto_increment because that will be used for phone too, and in phone there is a standart.
		name varchar(255) not null,
		thumb_pic varchar(255) not null,
		UF char(3) not null,
		#constrants
		PRIMARY KEY (country_id)
	);
*/

class country{
	public $country_id;
	public $name;
	public $thumb_pic;
    public $uf;

    public function __construct($country_id, $name, $thumb_pic, $uf){
        $this->country_id = $country_id;
        $this->name = $name;
        $this->thumb_pic = $thumb_pic;
        $this->uf = $uf;        
    }
}

?>