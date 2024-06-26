<?php

namespace Container6Uw5kLv;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_UserConfirmationCodes_TaggableService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.user_confirmation_codes.taggable' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TagAwareAdapter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/cache/Adapter/TagAwareAdapterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/cache-contracts/TagAwareCacheInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/cache/Adapter/TagAwareAdapter.php';

        return $container->privates['.user_confirmation_codes.taggable'] = new \Symfony\Component\Cache\Adapter\TagAwareAdapter(($container->privates['user_confirmation_codes'] ?? self::getUserConfirmationCodesService($container)));
    }
}
