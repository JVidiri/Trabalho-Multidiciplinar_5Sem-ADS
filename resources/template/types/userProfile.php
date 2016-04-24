<?php
/*
    create table profile(
        profile_id int auto_increment,
        fk_user_id int not null, #fk to user_akko
        fk_profile_type_id int not null,
        complete_name varchar(255),
        about varchar(500), 
        birth date,
        alias varchar(64),
        curriculum varchar(512), #We will encorage the user to store this in other local and put a link here.   
        #Constrants
        PRIMARY KEY (profile_id),
        FOREIGN KEY (fk_user_id) REFERENCES user(user_id),
        FOREIGN KEY (fk_profile_type_id) REFERENCES profile_type(type_id)
    );

*/
class userProfile{
    /* Basic info for the profile */
    public $profile_photo;
	public $profile_id;
	public $user; //Type user
    public $complete_name;
    public $about;
    public $birth;
    public $alias;
    public $curriculum;

    public function __construct($profile_id, $user, $complete_name, $about, $birth, $alias, $curriculum){
        $this->profile_id = $profile_id;
        $this->user = $user;
        $this->complete_name = $complete_name;
        $this->about = $about;
        $this->birth = $birth;
        $this->alias = $alias;
        $this->curriculum = $curriculum;
    }
}
?>