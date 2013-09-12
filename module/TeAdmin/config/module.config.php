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
     // Doctrine config
    'doctrine' => array(
        'driver' => array(
            'teadmin_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/TeAdmin/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'TeAdmin\Entity' => 'teadmin_driver'
                )
            )
        )
    ),
    'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class' => 'TeAdmin\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
    ),
    'bjyauthorize' => array(
        // Using the authentication identity provider, which basically reads the roles from the auth service's identity
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',
        'role_providers' => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'TeAdmin\Entity\Role',
            ),
        ),
        // Guard listeners to be attached to the application event manager
        'guards' => array(
            'BjyAuthorize\Guard\Controller' => array(
                array(
                    'controller' => 'TeAdmin\Controller\Index',
                    'action' => 'index',
                    'roles' => array('guest','user','admin'),
                ),
                array(
                    'controller' => 'zfcuser',
                    'action' => 'index',
                    'roles' => array('guest','user','admin'),
                ),
                array(
                    'controller' => 'zfcuser',
                    // no action specified - all actions allowed!
                    'action' => 'changepassword',
                    'roles' => array('user','admin'),
                ),
                array(
                    'controller' => 'zfcuser',
                    // no action specified - all actions allowed!
                    'action' => 'changeemail',
                    'roles' => array('user','admin'),
                ),
                array(
                    'controller' => 'zfcuser',
                    // no action specified - all actions allowed!
                    'action' => 'register',
                    'roles' => array('guest','user','admin'),
                ),
                array(
                    'controller' => 'zfcuser',
                    // no action specified - all actions allowed!
                    'action' => 'login',
                    'roles' => array('guest','user','admin'),
                ),
                array(
                    'controller' => 'zfcuser',
                    // no action specified - all actions allowed!
                    'action' => 'logout',
                    'roles' => array('guest','user','admin'),
                ),
            ),
        ),
    ),
);