<?php

namespace App\Events;

use App\Entity\User;
use Twig\Environment;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use ApiPlatform\Symfony\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Psr\Log\LoggerInterface;

class EmailSender implements EventSubscriberInterface
{
    private Environment $twig;
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(Environment $twig, MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->twig = $twig;
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public static function getSubscribedEvents(): array
    {
        return
        [
            KernelEvents::VIEW => ['sendMail', EventPriorities::PRE_WRITE]
        ];
    }

    public function sendMail(ViewEvent $event): void
    {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if ($user instanceof User && $method === "POST")
        {
            $this->logger->info('User registration detected, preparing to send email.');

            try
            {
                $email = (new Email())
                    ->from('serviceplus@gmail.com')
                    ->to($user->getEmail())
                    ->subject('Service Plus Authentification')
                    ->html(
                        $this->twig->render(
                            'emails/registration.html.twig',
                            [
                                'user' => $user,
                                'verificationCode' => $user->getVerificationCode()
                            ]
                        )
                    );

                $this->mailer->send($email);
                $this->logger->info('Email sent successfully to ' . $user->getEmail());

            }

            catch (TransportExceptionInterface $e)
            {
                $this->logger->error('Error sending email: ' . $e->getMessage());
            }
        } 

        else
            $this->logger->info('Not a POST request or not an instance of User.');
    }
}