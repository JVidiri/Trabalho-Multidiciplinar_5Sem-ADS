<?php
require_once("/var/www/html/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/types/admin.php");

class adminTypeTest extends PHPUnit_Framework_TestCase{

	public function testCreateAdminObjectSuccess()
    {    	
    	$admTest = new Admin(1,"adm", "*23AE809DDACAF96AF0FD78ED04B6A265E05AA257");    	
        $this->assertEquals(1, $admTest->admin_user_id);
        $this->assertEquals("adm", $admTest->name);
        $this->assertEquals("*23AE809DDACAF96AF0FD78ED04B6A265E05AA257", $admTest->pass_hash);
    }
}
?>