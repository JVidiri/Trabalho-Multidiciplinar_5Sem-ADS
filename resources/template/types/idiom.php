<?php
/*
    table idiom(
        idiom_id int auto_increment,
        name varchar(64) not null,
        fk_country_id int not null,
        #Constrants
        PRIMARY KEY (idiom_id),
        FOREIGN KEY (fk_country_id) REFERENCES country(country_id)
    );
*/
class user{
	public $idiom_id;
	public $name;
	public $fk_country_id;    

    public function __construct($idiom_id, $name, $fk_country_id){
        $this->idiom_id = $idiom_id;
        $this->name = $name;
        $this->fk_country_id = $fk_country_id;        
    }
}
?>