<?php
 namespace BusuuTest;

 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;

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
 }