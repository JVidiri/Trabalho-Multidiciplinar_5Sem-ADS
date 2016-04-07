<?php
/*
	table city(
		city_id int auto_increment,
		name varchar(64) not null,
		fk_government_district int not null,#fk for the government district A.K.A. state.
		#constrants
		PRIMARY KEY (city_id),
		FOREIGN KEY (fk_government_district) REFERENCES government_district(government_district_id)
	);
*/
class city{
	public $city_id;
	public $name;
	public $fk_government_district;

    public function __construct($city_id, $name, $fk_government_district){
        $this->city_id = $city_id;
        $this->name = $name;
        $this->fk_government_district = $fk_government_district;        
    }
}
?>