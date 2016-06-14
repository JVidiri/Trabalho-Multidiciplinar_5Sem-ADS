<?php
/*
    table badge(
        badge_id int not null,
        fk_type_id int not null,
        title varchar(64) not null,
        description varchar(511),
        thumb varchar(255) not null,
        # Constrants
        PRIMARY KEY (badge_id),
        FOREIGN KEY (fk_type_id) REFERENCES badge_type(type_id)
    );
*/
class badge{
	public $badge_id;
	public $fk_type_id;
	public $title;
    public $description;
	public $thumb;	

    public function __construct($badge_id, $fk_type_id, $title, $description, $thumb){
        $this->badge_id = $badge_id;
        $this->fk_type_id = $fk_type_id;
        $this->title = $title;
        $this->description = $description;
        $this->thumb = $thumb;
    }
}
?>