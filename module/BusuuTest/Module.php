<?php
namespace BusuuTest;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use BusuuTest\Model\BusuuTest;
use BusuuTest\Model\BusuuTestTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface
{
    public function getAutoloaderConfig()
    {
        // AF: Commented as we are using composer to autoload classes
        // return array(
        //     'Zend\Loader\ClassMapAutoloader' => array(
        //         __DIR__ . '/autoload_classmap.php',
        //     ),
        //     'Zend\Loader\StandardAutoloader' => array(
        //         'namespaces' => array(
        //             __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
        //         ),
        //     ),
        // );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'BusuuTest\Model\BusuuTestTable' =>  function($sm) {
                    $tableGateway = $sm->get('BusuuTestTableGateway');
                    $table = new BusuuTestTable($tableGateway);
                    
                    return $table;
                },
                'BusuuTestTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new BusuuTest());
                    
                    return new TableGateway('comments', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}