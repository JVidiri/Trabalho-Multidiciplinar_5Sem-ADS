<?php
/*
    table badge_type(
        type_id int auto_increment,
        name varchar(64),
        # Constrants
        PRIMARY KEY (type_id)
    );
*/
class badgeType{
	public $type_id;	
	public $name;	

    public function __construct($badge_id, $fk_type_id, $title, $description, $thumb){
        $this->type_id = $type_id;        
        $this->name = $name;
    }
}
?>