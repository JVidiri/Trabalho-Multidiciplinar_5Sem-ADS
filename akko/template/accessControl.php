<?php
/* Access control functions. */
include_once('sql/dbFacade.php');
include_once('sql/handlers/userDB.php');

/* Start a php session handler. */
session_start();

/*
	Verify if the user information is already in _SESSION 
	or is a new request in _POST var yet.
*/
$mail = isset($_POST['mail']) ? $_POST['mail'] : $_SESSION['mail'];
$password = isset($_POST['password']) ? $_POST['password'] : $_SESSION['password'];

/* If is not set the user don't login yet. */
if(!isset($uid)) {
	//Show The login form here.
	echo "<h4>You are not logged yet</h4>";
	echo "<p>Please go to <a href=\"login.php\">login page</a>.</p>";
	exit;
}

$_SESSION['mail'] = $mail;
$_SESSION['password'] = $password;

/* Verify the user with the user id and password. */
$result = verifyByIdAndPassword($mail, $password);

if ($result){
	unset($_SESSION['mail']);
	unset($_SESSION['password']);
}

$username = mysql_result($result,0,'name');
?>