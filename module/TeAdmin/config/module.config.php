<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'TeAdmin\Controller\Index' => 'TeAdmin\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'TeAdmin\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'teadmin' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'TeAdmin\Controller',
                        'controller' => 'TeAdmin\Controller\Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',            
        ),
        'template_path_stack' => array(
            'teadmin' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy'
        )
    ),
//     // Doctrine config
//    'doctrine' => array(
//        'driver' => array(
//            'teshopify_driver' => array(
//                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
//                'cache' => 'array',
//                'paths' => array(__DIR__ . '/../src/TeShopify/Entity')
//            ),
//            'orm_default' => array(
//                'drivers' => array(
//                    'TeShopify\Entity' => 'teshopify_driver'
//                )
//            )
//        )
//    )
);