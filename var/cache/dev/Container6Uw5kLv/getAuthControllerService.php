<?php

namespace Container6Uw5kLv;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAuthControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\AuthController' shared autowired service.
     *
     * @return \App\Controller\AuthController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/AuthController.php';

        $container->services['App\\Controller\\AuthController'] = $instance = new \App\Controller\AuthController(($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container)), ($container->services['lexik_jwt_authentication.jwt_manager'] ?? $container->load('getLexikJwtAuthentication_JwtManagerService')));

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\AuthController', $container));

        return $instance;
    }
}
