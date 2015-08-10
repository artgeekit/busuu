<?php

namespace BusuuTestTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class BusuuTestControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(
            include 'C:\wamp\www\busuu\config\application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
	{
		$commentTableMock = $this->getMockBuilder('BusuuTest\Model\BusuuTestTable')
                            ->disableOriginalConstructor()
                            ->getMock();
	    $serviceManager = $this->getApplicationServiceLocator();
	    $serviceManager->setAllowOverride(true);
	    $serviceManager->setService('BusuuTest\Model\BusuuTestTable', $commentTableMock);

	    $this->dispatch('/busuutest');
	    $this->assertResponseStatusCode(200);

	    $this->assertModuleName('BusuuTest');
	    $this->assertControllerName('BusuuTest\Controller\BusuuTest');
	    $this->assertControllerClass('BusuuTestController');
	    $this->assertMatchedRouteName('busuutest');
	}

    public function testUpAction()
    {
    	 $this->dispatch('/busuutest/up/1');
    	 $this->assertResponseStatusCode(200);
    }
}