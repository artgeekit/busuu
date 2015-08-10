<?php
/**
 * @author Arthur Frank <fank.artur0303@gmai.com>
 * @descripton Configuration file
 */

return array(
    'controllers' => array(
         'invokables' => array(
             'BusuuTest\Controller\BusuuTest' => 'BusuuTest\Controller\BusuuTestController',
         ),
     ),
    
     'router' => array(
         'routes' => array(
             'busuutest' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/busuutest[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'BusuuTest\Controller\BusuuTest',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

    'view_manager' => array(
         'template_path_stack' => array(
             'busuutest' => __DIR__ . '/../view',
         ),
        'template_map' => array(
           'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
        ),
     ),
);
