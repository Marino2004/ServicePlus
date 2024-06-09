<?php

namespace ContainerLAvxJ7x;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGesdinet_Jwtrefreshtoken_UserProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'gesdinet.jwtrefreshtoken.user_provider' shared service.
     *
     * @return \Gesdinet\JWTRefreshTokenBundle\Security\Provider\RefreshTokenProvider
     *
     * @deprecated Since gesdinet/jwt-refresh-token-bundle 1.0: The "gesdinet.jwtrefreshtoken.user_provider" service is deprecated.
     */
    public static function do($container, $lazyLoad = true)
    {
        trigger_deprecation('gesdinet/jwt-refresh-token-bundle', '1.0', 'The "gesdinet.jwtrefreshtoken.user_provider" service is deprecated.');

        return new \Gesdinet\JWTRefreshTokenBundle\Security\Provider\RefreshTokenProvider(($container->services['gesdinet.jwtrefreshtoken.refresh_token_manager'] ?? $container->load('getGesdinet_Jwtrefreshtoken_RefreshTokenManagerService')));
    }
}
