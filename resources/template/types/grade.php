<?php
/*
    table grade(
        grade_id int auto_increment;
        title varchar(255) not null;
        pontuation int not null;
        fk_country_id int not null;
    )
*/
class grade{
	public $grade_id;
	public $title;
	public $pontuation;
    public $fk_country_id;

    public function __construct($grade_id, $title, $pontuation, $fk_country_id){
        $this->grade_id = $grade_id;
        $this->title = $title;        
        $this->pontuation = $pontuation;
        $this->fk_country_id = $fk_country_id;
    }
}
?>