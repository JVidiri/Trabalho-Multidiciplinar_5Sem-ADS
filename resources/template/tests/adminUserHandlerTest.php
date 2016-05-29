<?php
$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__) . "/../../../..";
require_once("/var/www/html/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/handler/search.php");  
require_once("/var/www/html/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/handler/admin.php");

class adminUserHandlerTests extends PHPUnit_Framework_TestCase{

	protected static $adminUserHandler;
	protected static $adminUserObject;

	protected function setUp()
    {
        self::$adminUserHandler = new adminHandler();
    }

    public static function tearDownAfterClass()
    {
    	unset($_SERVER['DOCUMENT_ROOT']);//resetando a variavel de ambiente.
    }

	public function testInsertNewAdmin()
    {   
        self::$adminUserObject = new Admin(null, "sambanele", "sambi123");
		$ret = self::$adminUserHandler->insert(self::$adminUserObject);
		$this->assertEquals(1, $ret);
    }

    public function testInsertNewAdminDuplicated()
    {   
        $ret = self::$adminUserHandler->insert(self::$adminUserObject);
        $this->assertEquals("Database error, try again", $ret);
    }

    public function testGetByNameNewAdmin()
    {
		self::$adminUserObject = self::$adminUserHandler->getUserByAdminName("sambanele");
		$this->assertEquals("sambanele", self::$adminUserObject->name);
    }

    public function testGetByNameNewAdminFail()
    {
        $tempAdminObj = self::$adminUserHandler->getUserByAdminName("adminInexistente");
        $this->assertEquals(NULL, $tempAdminObj);
    }

    public function testUpdateNewAdmin()
    {
    	self::$adminUserObject->pass_hash = "Samb1234";
		$ret = self::$adminUserHandler->update(self::$adminUserObject);
        self::$adminUserObject = self::$adminUserHandler->getUserByAdminName("sambanele");
		$this->assertEquals(1, $ret);
    }

    public function testVerifyByNameAndPassword(){
        $ret = self::$adminUserHandler->verifyByNameAndPassword("sambanele","Samb1234");
        $this->assertEquals(self::$adminUserObject, $ret);
    }

    public function testVerifyByNameAndPasswordFail(){
        $ret = self::$adminUserHandler->verifyByNameAndPassword("sambanele","Samb123");
        $this->assertEquals(NULL, $ret);
    }

	public function testDeleteNewAdmin()
    {    	
		$ret = self::$adminUserHandler->delete(self::$adminUserObject->admin_user_id);
		$this->assertEquals(1, $ret);
    }
}
?>