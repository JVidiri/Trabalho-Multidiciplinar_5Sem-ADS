<?php
/*    
    table profile_type(
        type_id int auto_increment,
        name varchar(64) not null,
        description varchar(255),
        #Constrants
        PRIMARY KEY (type_id)
    );
*/
class profileType{
	public $type_id;
	public $name;	
    public $description;	

    public function __construct($type_id, $name, $description){
        $this->type_id = $type_id;        
        $this->name = $name;
        $this->description = $description;
    }
}
?>