<?php

namespace ContainerLAvxJ7x;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEmailSenderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Events\EmailSender' shared autowired service.
     *
     * @return \App\Events\EmailSender
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Events/EmailSender.php';

        $a = ($container->privates['twig'] ?? self::getTwigService($container));

        if (isset($container->privates['App\\Events\\EmailSender'])) {
            return $container->privates['App\\Events\\EmailSender'];
        }
        $b = ($container->privates['mailer.mailer'] ?? $container->load('getMailer_MailerService'));

        if (isset($container->privates['App\\Events\\EmailSender'])) {
            return $container->privates['App\\Events\\EmailSender'];
        }

        return $container->privates['App\\Events\\EmailSender'] = new \App\Events\EmailSender($a, $b, ($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)));
    }
}
