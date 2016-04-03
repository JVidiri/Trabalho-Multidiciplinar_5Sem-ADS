<?php
/*	
	table government_district(
		government_district_id int auto_increment,
		name varchar(64) not null,
		UF char(3) not null,
		fk_country int not null,
		#constrants
		PRIMARY KEY (government_district_id),
		FOREIGN KEY (fk_country) REFERENCES country(country_id)
	);
*/
class governmentDistrict{
	public $government_district_id;
	public $name;
	public $uf;
    public $fk_country;	

    public function __construct($government_district_id, $name, $uf, $fk_country){
        $this->government_district_id = $government_district_id;
        $this->name = $name;
        $this->uf = $uf;        
        $this->fk_country = $fk_country;
    }
}
?>