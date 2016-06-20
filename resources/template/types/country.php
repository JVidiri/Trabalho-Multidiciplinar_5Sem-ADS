<?php 
/* 
	table country(
		country_id int,# Not auto_increment because that will be used for phone too, and in phone there is a standart.
		name varchar(255) not null,
		thumb varchar(255) not null,
		UF char(3) not null,
		#constrants
		PRIMARY KEY (country_id)
	);
*/

class country{
	public $country_id;
	public $name;
	public $thumb;
    public $uf;

    public function __construct($country_id, $name, $thumb, $uf){
        $this->country_id = $country_id;
        $this->name = $name;
        $this->thumb = $thumb;
        $this->uf = $uf;        
    }
}

?>