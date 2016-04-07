/*
	PRocedures events e Functions para tabela de banco de dados criada para a disciplina de DWE;

	Grupo:
	  Grupo: João Pedro Santos Vidiri; 
	  Leticia Bruna; 
	  Flávio Antonio da Silva; 
	  Caio Martoni;
*/

/* 
	Updates the last login date from given user.
*/
create procedure update_user_last_login(useId int)
	update user set last_login = STR_TO_DATE(curdate(), '%Y-%m-%d') where `user`.`user_id` = useId;

/* 
	Updates the given user confirmation e-mail with the passed flag.
	This must be 1 for confirmed and 0 for uncofirmed
*/
create procedure update_user_is_confirmed(useId int, isConfirmed int)
	update user set is_confirmed = isConfirmed where `user`.`user_id` = useId;

/*
	Event to delete user who don't confirm email, will run every two days.
*/
CREATE EVENT evt_delete_inactive_user
	ON SCHEDULE EVERY 2 DAY
	STARTS '2016-3-28 00:00:00'
DO
  	DELETE FROM user Where is_confirmed = 0;