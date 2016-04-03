<?php
/*
    table idiom_level(
        idiom_level_id int auto_increment,
        name varchar(64),
        description varchar(255),
        #Constrants
        PRIMARY KEY (idiom_level_id)
    );
*/
class idiomLevel{
	public $idiom_level_id;	
    public $name; 
    public $description; 

    public function __construct($idiom_level_id, $name, $description){
        $this->idiom_level_id = $idiom_level_id;
        $this->name = $name;
        $this->description = $description;        
    }
}
?>