<?php
$_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__) . "/../../../..";
require_once("/var/www/html/Trabalho-Multidiciplinar_5Sem-ADS/resources/template/handler/search.php");	

class searchHandlerTests extends PHPUnit_Framework_TestCase{
	protected static $searchHandler;

	protected function setUp()
    {
        self::$searchHandler = new searchHandler();
    }

    public static function tearDownAfterClass()
    {
    	unset($_SERVER['DOCUMENT_ROOT']);//resetando a variavel de ambiente.
    }

    public function testSearchUsersByNameNotExists(){        
        $ret = self::$searchHandler->searchUsersBySearchTerm("Sambaneli");
        $this->assertEquals("[]",json_encode($ret));
    }

    public function testSearchUsersBySearchTermByCompleteFirstName(){        
        $ret = self::$searchHandler->searchUsersBySearchTerm("João");
        $this->assertEquals("[{\"profile_id\":\"665\",\"complete_name\":\"Jo\u00e3o Pedro Santos Vidiri\"}]",json_encode($ret));
    }

    public function testSearchUsersBySearchTermByCompleteSecondName(){        
        $ret = self::$searchHandler->searchUsersBySearchTerm("João Pedro");
        $this->assertEquals("[{\"profile_id\":\"665\",\"complete_name\":\"Jo\u00e3o Pedro Santos Vidiri\"}]",json_encode($ret));
    }

    public function testSearchUsersBy(){        
        $ret = self::$searchHandler->searchUsersBySearchTerm("João Pedro");
        $this->assertEquals("[{\"profile_id\":\"665\",\"complete_name\":\"Jo\u00e3o Pedro Santos Vidiri\"}]",json_encode($ret));
    }

    public function testSearchUsersBySearchTermByCompleteLastName(){        
        $ret = self::$searchHandler->searchUsersBySearchTerm("Vidiri");
        $this->assertEquals("[{\"profile_id\":\"665\",\"complete_name\":\"Jo\u00e3o Pedro Santos Vidiri\"}]",json_encode($ret));
    }

    public function testSearchBadgesByTitleWord(){        
        $ret = self::$searchHandler->searchBadgesBySearchTerm("hell");
        $this->assertEquals("[{\"badge_id\":\"2\",\"title\":\"HR of hell\"}]",json_encode($ret));
    }

    public function testSearchPostByTitleWord(){
        $ret = self::$searchHandler->searchPostsBySearchTerm("primeiro");
        $this->assertEquals("[{\"post_id\":\"1\",\"content\":\"Meu primeiro post\"}]",json_encode($ret));
    }
}
?>