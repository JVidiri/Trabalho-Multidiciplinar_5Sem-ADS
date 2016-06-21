<?php
/*table post(
	post_id int auto_increment,	
	fk_user_id int not null, #fk for user,
	content varchar(1024) not null,
	date_of_post date not null,
	#constrants
	PRIMARY KEY (post_id),
	FOREIGN KEY (fk_user_id) REFERENCES user(user_id),
	FULLTEXT content_index (content)
);*/

class post{
	public $post_id;
	public $fk_user_id;	
    public $conte//nt;
    public $date_of_post;

    public function __construct($post_id, $fk_user_id, $content, $date_of_post){
        $this->post_id = $post_id;
		$this->fk_user_id = $fk_user_id;	
		$this->content = $content;
		$this->date_of_post = $date_of_post;
    }
}

?>