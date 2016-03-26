<?php 
class dbFacade {
	/* BdFacade, create a database conection and some functions for the application. */
	protected static $dbHandler = false;

	/*Function to centrilize the connetion to the database.*/
	function connect() {
    	self::$dbHandler = new PDO('mysql:host=localhost;dbname=IFSP;charset=utf8'
							, 'root'
							, '0000');
    	self::$dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	}

  	protected function fatal_error($msg) {
	    echo "<pre>Error!: $msg\n";
	    $bt = debug_backtrace();
	    foreach($bt as $line) {
	      $args = var_export($line['args'], true);
	      echo "{$line['function']}($args) at {$line['file']}:{$line['line']}\n";
	    }
	    echo "</pre>";
	    die();
  	}

	protected function isRightType($toTest, $Type){
		if (is_a($toTest, $Type)){
			return true;
        }else{
            fatal_error("Wrong class type.");
            return false;
        }
	}
}
?>