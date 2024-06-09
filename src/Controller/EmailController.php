<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmailController extends AbstractController
{
    #[Route('/test-email', name: 'test_email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('tmarinomiha7@gmail.com')
            ->to('khayri22@gmail.com')
            ->subject('Khayri mon Fils')
            ->text('Khayri je taime');

        $mailer->send($email);

        return $this->json(['message' => 'Test email sent successfully.']);
    }
}
